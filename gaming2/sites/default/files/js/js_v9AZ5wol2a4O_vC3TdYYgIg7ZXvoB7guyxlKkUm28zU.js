/**
 * @file
 * JavaScript behaviors for CodeMirror integration.
 */

(function ($, Drupal) {

  'use strict';

  // @see http://codemirror.net/doc/manual.html#config
  Drupal.webform = Drupal.webform || {};
  Drupal.webform.codeMirror = Drupal.webform.codeMirror || {};
  Drupal.webform.codeMirror.options = Drupal.webform.codeMirror.options || {};

  /**
   * Initialize CodeMirror editor.
   *
   * @type {Drupal~behavior}
   */
  Drupal.behaviors.webformCodeMirror = {
    attach: function (context) {
      if (!window.CodeMirror) {
        return;
      }

      // Webform CodeMirror editor.
      $(context).find('textarea.js-webform-codemirror').once('webform-codemirror').each(function () {
        var $input = $(this);

        // Open all closed details, so that editor height is correctly calculated.
        var $details = $(this).parents('details:not([open])');
        $details.attr('open', 'open');

        // #59 HTML5 required attribute breaks hack for webform submission.
        // https://github.com/marijnh/CodeMirror-old/issues/59
        $(this).removeAttr('required');

        var options = $.extend({
          mode: $(this).attr('data-webform-codemirror-mode'),
          lineNumbers: true,
          viewportMargin: Infinity,
          readOnly: ($(this).prop('readonly') || $(this).prop('disabled')) ? true : false,
          // Setting for using spaces instead of tabs - https://github.com/codemirror/CodeMirror/issues/988
          extraKeys: {
            Tab: function (cm) {
              var spaces = Array(cm.getOption('indentUnit') + 1).join(' ');
              cm.replaceSelection(spaces, 'end', '+element');
            }
          }
        }, Drupal.webform.codeMirror.options);

        var editor = CodeMirror.fromTextArea(this, options);

        // Now, close details.
        $details.removeAttr('open');

        // Issue #2764443: CodeMirror is not setting submitted value when
        // rendered within a webform UI dialog.
        editor.on('blur', function (event) {
          editor.save();
        });

        // Update CodeMirror when the textarea's value has changed.
        // @see webform.states.js
        $input.on('change', function () {
          editor.getDoc().setValue($input.val());
        });

        // Set CodeMirror to be readonly when the textarea is disabled.
        // @see webform.states.js
        $input.on('webform:disabled', function () {
          editor.setOption('readOnly', $input.is(':disabled'));
        });

      });

      // Webform CodeMirror syntax coloring.
      $(context).find('.js-webform-codemirror-runmode').once('webform-codemirror-runmode').each(function () {
        // Mode Runner - http://codemirror.net/demo/runmode.html
        CodeMirror.runMode($(this).addClass('cm-s-default').text(), $(this).attr('data-webform-codemirror-mode'), this);
      });

    }
  };

  /****************************************************************************/
  // Refresh functions.
  /****************************************************************************/

  /**
   * Refresh codemirror element to make sure it renders correctly.
   *
   * @param element
   *   An element containing a CodeMirror editor.
   */
  function refresh(element) {
    // Show tab panel and open details.
    var $tabPanel = $(element).parents('.ui-tabs-panel:hidden');
    $tabPanel.show();
    var $details = $(element).parents('details:not([open])');
    $details.attr('open', 'open');

    element.CodeMirror.refresh();

    // Hide tab panel and close details.
    $tabPanel.hide();
    $details.removeAttr('open');
  }

  // Workaround: When a dialog opens we need to reference all CodeMirror
  // editors to make sure they are properly initialized and sized.
  $(window).on('dialog:aftercreate', function (dialog, $element, settings) {
    // Delay refreshing CodeMirror for 10 millisecond while the dialog is
    // still being rendered.
    // @see http://stackoverflow.com/questions/8349571/codemirror-editor-is-not-loading-content-until-clicked
    setTimeout(function () {
      $('.CodeMirror').each(function (index, element) {
        refresh(element);
      });
    }, 10);
  });

  // On state:visible refresh CodeMirror elements.
  $(document).on('state:visible', function (event) {
    var $element = $(event.target).parent().find('.js-webform-codemirror');
    $element.parent().find('.CodeMirror').each(function (index, element) {
      setTimeout(function () {
        refresh(element);
      }, 1);
    });
  });

})(jQuery, Drupal);
;
(function ($, Drupal) {
  "use strict";

  /**
   * @file
   * Provides methods for integrating Imce into text fields.
   */

  /**
   * Drupal behavior to handle url input integration.
   */
  Drupal.behaviors.imceUrlInput = {
    attach: function (context, settings) {
      $('.imce-url-input', context).not('.imce-url-processed').addClass('imce-url-processed').each(imceInput.processUrlInput);
    }
  };
  
  /**
   * Global container for integration helpers.
   */
  var imceInput = window.imceInput = window.imceInput || {

    /**
     * Processes an url input.
     */
    processUrlInput: function(i, el) {
      var button = imceInput.createUrlButton(el.id, el.getAttribute('data-imce-type'));
      el.parentNode.insertBefore(button, el);
    },

    /**
     * Creates an url input button.
     */
    createUrlButton: function(inputId, inputType) {
      var button = document.createElement('a');
      button.href = '#';
      button.className = 'imce-url-button';
      button.innerHTML = '<span>' + Drupal.t('Open File Browser') + '</span>';
      button.onclick = imceInput.urlButtonClick;
      button.InputId = inputId || 'imce-url-input-' + (Math.random() + '').substr(2);
      button.InputType = inputType || 'link';
      return button;
    },

    /**
     * Click event of an url button.
     */
    urlButtonClick: function(e) {
      var url = Drupal.url('imce');
      url += (url.indexOf('?') === -1 ? '?' : '&') + 'sendto=imceInput.urlSendto&inputId=' + this.InputId + '&type=' + this.InputType;
      // Focus on input before opening the window
      $('#' + this.InputId).focus();
      window.open(url, '', 'width=' + Math.min(1000, parseInt(screen.availWidth * 0.8, 10)) + ',height=' + Math.min(800, parseInt(screen.availHeight * 0.8, 10)) + ',resizable=1');
      return false;
    },

    /**
     * Sendto handler for an url input.
     */
    urlSendto: function(File, win) {
      var url = File.getUrl();
      var el = $('#' + win.imce.getQuery('inputId'))[0];
      win.close();
      if (el) {
        $(el).val(url).change().focus();
        // Auto-update image alt input with image name.
        var name = el.name;
        var re = /(^|[^a-z])src([^a-z]|$)/i;
        if (name && re.test(name)) {
          var altEl = el.form && el.form.elements[name.replace(re, '$1alt$2')];
          if (altEl && !altEl.value) {
            altEl.value = el.value.split('/').pop();
          }
        }
      }
    }
  
  };

})(jQuery, Drupal);
;
/**
 * @file
 * JavaScript behaviors for IMCE.
 */

(function ($, Drupal) {

  'use strict';

  /**
   * Override processUrlInput to place the 'Open File Browser' links after the target element.
   */
  window.imceInput.processUrlInput = function (i, el) {
    var button = imceInput.createUrlButton(el.id, el.getAttribute('data-imce-type'));
    $(button).insertAfter($(el));
  };

})(jQuery, Drupal);
;
