<?php

/* modules/contrib/addtoany/templates/addtoany-standard.html.twig */
class __TwigTemplate_9ccf7eaa531982dbcf35004640e44deff183a323e6101cee23ceb5b4b14a006b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("spaceless" => 19, "if" => 21, "set" => 22);
        $filters = array("url_encode" => 23, "raw" => 37);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('spaceless', 'if', 'set'),
                array('url_encode', 'raw'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 19
        ob_start();
        // line 20
        echo "
  ";
        // line 21
        if ((($context["button_setting"] ?? null) != "none")) {
            // line 22
            echo "    ";
            ob_start();
            // line 23
            echo "      <a class=\"a2a_dd addtoany_share\" href=\"https://www.addtoany.com/share#url=";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_urlencode_filter(($context["link_url"] ?? null)), "html", null, true));
            echo "&amp;title=";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_urlencode_filter(($context["link_title"] ?? null)), "html", null, true));
            echo "\">
        ";
            // line 24
            if (($context["button_image"] ?? null)) {
                // line 25
                echo "          <img src=\"";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["button_image"] ?? null), "html", null, true));
                echo "\">
        ";
            }
            // line 27
            echo "      </a>
    ";
            $context["universal_button"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 29
            echo "  ";
        }
        // line 30
        echo "
  <span class=\"a2a_kit a2a_kit_size_";
        // line 31
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["buttons_size"] ?? null), "html", null, true));
        echo " addtoany_list\" data-a2a-url=\"";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["link_url"] ?? null), "html", null, true));
        echo "\" data-a2a-title=\"";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["link_title"] ?? null), "html", null, true));
        echo "\">
    ";
        // line 32
        if ((($context["universal_button_placement"] ?? null) == "before")) {
            // line 33
            echo "      ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["universal_button"] ?? null), "html", null, true));
            echo "
    ";
        }
        // line 35
        echo "
    ";
        // line 36
        if (($context["addtoany_html"] ?? null)) {
            // line 37
            echo "      ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(($context["addtoany_html"] ?? null)));
            echo "
    ";
        }
        // line 39
        echo "
    ";
        // line 40
        if ((($context["universal_button_placement"] ?? null) == "after")) {
            // line 41
            echo "      ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["universal_button"] ?? null), "html", null, true));
            echo "
    ";
        }
        // line 43
        echo "  </span>

";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "modules/contrib/addtoany/templates/addtoany-standard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 43,  110 => 41,  108 => 40,  105 => 39,  99 => 37,  97 => 36,  94 => 35,  88 => 33,  86 => 32,  78 => 31,  75 => 30,  72 => 29,  68 => 27,  62 => 25,  60 => 24,  53 => 23,  50 => 22,  48 => 21,  45 => 20,  43 => 19,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/addtoany/templates/addtoany-standard.html.twig", "C:\\wamp\\www\\gaming\\modules\\contrib\\addtoany\\templates\\addtoany-standard.html.twig");
    }
}
