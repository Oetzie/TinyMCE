<?php

/**
 * TinyMCE
 *
 * Copyright 2019 by Oene Tjeerd de Bruin <modx@oetzie.nl>
 */

require_once dirname(dirname(__DIR__)) . '/index.class.php';

class TinyMCEConfigManageManagerController extends TinyMCEManagerController
{
    /**
     * @access public.
     * @var Null|Object.
     */
    public $object = null;

    /**
     * @access public.
     */
    public function loadCustomCssJs()
    {
        $this->addJavascript($this->modx->tinymce->config['js_url'] . 'mgr/widgets/config/config.panel.js');

        $this->addLastJavascript($this->modx->tinymce->config['js_url'] . 'mgr/sections/config/config.js');

        $this->addHtml('<script type="text/javascript">
            Ext.onReady(function() {
                TinyMCE.config.record           = ' . $this->modx->toJSON($this->getConfig()) . ';

                TinyMCE.config.default_text     = "' . $this->getDummyText() . '";
            });
        </script>');
    }

    /**
     * @access public.
     * @return String.
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('tinymce.config_manage');
    }

    /**
     * @access public.
     * @return String.
     */
    public function getTemplateFile()
    {
        return $this->modx->tinymce->config['templates_path'] . 'config/config.tpl';
    }

    /**
     * @access public.
     * @param Array $properties.
     * @return Mixd.
     */
    public function process(array $properties = [])
    {
        $this->setConfig($properties);

        if (!$this->getConfig()) {
            return $this->failure($this->modx->lexicon('tinymce.config_not_exists', [
                'id' => $properties['id']
            ]));
        }
    }

    /**
     * @access public.
     * @param Array $properties.
     */
    public function setConfig(array $properties = [])
    {
        $this->object = $this->modx->getObject('TinyMCEConfig', [
            'id' => $properties['id']
        ]);
    }

    /**
     * @access public.
     * @return Null|Array.
     */
    public function getConfig()
    {
        if ($this->object !== null) {
            return array_merge([
                'name' => $this->object->get('name')
            ], $this->modx->tinymce->getDefaultConfig(json_decode($this->object->get('config'), true)));
        }

        return null;
    }

    /**
     * @access public.
     * @return String.
     */
    public function getDummyText()
    {
        $dummyText = '<h1>Sed ad haec, nisi molestum est, habeo quae velim.</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Avaritiamne minuis?</strong> <a href="https://www.sterc.com" target="_blank">Cur iustitia laudatur?</a> Duo Reges: constructio interrete. <a href="https://www.sterc.com" target="_blank">Prioris generis est docilitas, memoria;</a> Sed nimis multa. Omnes enim iucundum motum, quo sensus hilaretur. <em>Age sane, inquam.</em></p>
        <ol>
            <li>Quaesita enim virtus est, non quae relinqueret naturam, sed quae tueretur.</li>
            <li>Oculorum, inquit Plato, est in nobis sensus acerrimus, quibus sapientiam non cernimus.</li>
            <li>Mihi, inquam, qui te id ipsum rogavi?</li>
        </ol>
        <p><img src="https://www.sterc.nl/manager/templates/default/images/modx-logo-color.svg" alt="MODx"></p>
        <p>Ergo illi intellegunt quid Epicurus dicat, ego non intellego? Nos paucis ad haec additis finem faciamus aliquando; <strong>Urgent tamen et nihil remittunt.</strong> Eam si varietatem diceres, intellegerem, ut etiam non dicente te intellego; Utrum igitur tibi litteram videor an totas paginas commovere? <em>Sint ista Graecorum;</em></p>
        <h3>Nihil opus est exemplis hoc facere longius.</h3>
        <p>Itaque haec cum illis est dissensio, cum Peripateticis nulla sane. Quo plebiscito decreta a senatu est consuli quaestio Cn. Tu enim ista lenius, hic Stoicorum more nos vexat. Atque his de rebus et splendida est eorum et illustris oratio. Omnia contraria, quos etiam insanos esse vultis. <mark>Ut pulsi recurrant?</mark> Videamus igitur sententias eorum, tum ad verba redeamus. Beatus autem esse in maximarum rerum timore nemo potest. <a href="https://www.sterc.com" target="_blank">Venit ad extremum;</a> Mihi quidem Antiochum, quem audis, satis belle videris attendere.</p>
        <blockquote>Nec vero id satis est, neminem esse, qui ipse se oderit, sed illud quoque intellegendum est, neminem esse, qui,quo modo se habeat, nihil sua censeat inte resse.<cite>Redactor for MODX</cite></blockquote>
        <h2>De quibus cupio scire quid sentias.</h2>
        <p><mark>Haeret in salebra.</mark> Nobis aliter videtur, recte secusne, postea; Unum est sine dolore esse, alterum cum voluptate. </p>
        <p>Nec vero alia sunt quaerenda contra Carneadeam illam sententiam. <a href="https://www.sterc.com" target="_blank">Nobis aliter videtur, recte secusne, postea;</a> Invidiosum nomen est, infame, suspectum. Et non ex maxima parte de tota iudicabis? Nos paucis ad haec additis finem faciamus aliquando; Ergo illi intellegunt quid Epicurus dicat, ego non intellego?</p>
        <ul>
            <li>Non dolere, inquam, istud quam vim habeat postea videro;</li>
            <li>Laelius clamores sofòw ille so lebat Edere compellans gumias ex ordine nostros.</li>
            <li>Claudii libidini, qui tum erat summo ne imperio, dederetur.</li>
            <li>Respondent extrema primis, media utrisque, omnia omnibus.</li>
            <li>Luxuriam non reprehendit, modo sit vacua infinita cupiditate et timore.</li>
        </ul>
        <p>Animum autem reliquis rebus ita perfecit, ut corpus; Memini vero, inquam; Quid ei reliquisti, nisi te, quoquo modo loqueretur, intellegere, quid diceret? Quid in isto egregio tuo officio et tanta fide-sic enim existimo-ad corpus refers? <strong>Ut id aliis narrare gestiant?</strong> Roges enim Aristonem, bonane ei videantur haec: vacuitas doloris, divitiae, valitudo; </p>
        <p><a href="https://www.sterc.com" target="_blank" rel="noopener">Pollicetur certe.</a> Et ille ridens: Video, inquit, quid agas; </p>
        <p>Quo plebiscito decreta a senatu est consuli quaestio Cn. Dolere malum est: in crucem qui agitur, beatus esse non potest. Et quidem iure fortasse, sed tamen non gravissimum est testimonium multitudinis. Istic sum, inquit. Et quidem, inquit, vehementer errat; <em>Dici enim nihil potest verius.</em> <mark>Quod cum dixissent, ille contra.</mark> Ut in geometria, prima si dederis, danda sunt omnia.</p>';

        return addslashes(trim(preg_replace('/\s+/', ' ', $dummyText)));
    }
}
