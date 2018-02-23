<?php

/* modules/contrib/webform/modules/webform_example_composite/templates/webform-example-composite.html.twig */
class __TwigTemplate_4949bf8531d93fc1fb19663db3830aafc1c80ba3a39359573bddf8cad4f99a1f extends Twig_Template
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
        $tags = array("if" => 15);
        $filters = array();
        $functions = array("attach_library" => 14);

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if'),
                array(),
                array('attach_library')
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

        // line 14
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("webform_example_composite/webform_example_composite"), "html", null, true));
        echo "
";
        // line 15
        if (($context["flexbox"] ?? null)) {
            // line 16
            echo "
    <div class=\"webform-flexbox\">
      ";
            // line 18
            if ($this->getAttribute(($context["content"] ?? null), "first_name", array())) {
                // line 19
                echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "first_name", array()), "html", null, true));
                echo "</div></div>
      ";
            }
            // line 21
            echo "      ";
            if ($this->getAttribute(($context["content"] ?? null), "last_name", array())) {
                // line 22
                echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "last_name", array()), "html", null, true));
                echo "</div></div>
      ";
            }
            // line 24
            echo "      ";
            if ($this->getAttribute(($context["content"] ?? null), "date_of_birth", array())) {
                // line 25
                echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "date_of_birth", array()), "html", null, true));
                echo "</div></div>
      ";
            }
            // line 27
            echo "      ";
            if ($this->getAttribute(($context["content"] ?? null), "gender", array())) {
                // line 28
                echo "        <div class=\"webform-flex webform-flex--1\"><div class=\"webform-flex--container\">";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute(($context["content"] ?? null), "gender", array()), "html", null, true));
                echo "</div></div>
      ";
            }
            // line 30
            echo "    </div>

";
        } else {
            // line 33
            echo "  ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true));
            echo "
";
        }
        // line 35
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/webform/modules/webform_example_composite/templates/webform-example-composite.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 35,  93 => 33,  88 => 30,  82 => 28,  79 => 27,  73 => 25,  70 => 24,  64 => 22,  61 => 21,  55 => 19,  53 => 18,  49 => 16,  47 => 15,  43 => 14,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contrib/webform/modules/webform_example_composite/templates/webform-example-composite.html.twig", "C:\\wamp\\www\\gaming\\modules\\contrib\\webform\\modules\\webform_example_composite\\templates\\webform-example-composite.html.twig");
    }
}
