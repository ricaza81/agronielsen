@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')

                <div class="box-header">
                  <h3 class="box-title">Visor Estratégico de Oportunidades</h3>
                </div><!-- /.box-header -->

<input type="hidden" id="idempresa" value="<?=$usuario->empresa->id;?>"/>
<input type="hidden" id="company_name" value="<?=$usuario->empresa->nombreempresa;?>"/>

<!--<iframe class="embedly-embed" src="//cdn.embedly.com/widgets/media.html?src=https://datastudio.google.com/embed/reporting/a2b9da07-31a4-423e-ab45-bc1d00f29a1d/page/mM3VB%3Fparams%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580SuperAgro%2522%257D&dr=https%3A%2F%2Fdatastudio.google.com%2Fu%2F0%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB&dt=Copia%20de%20Dashboard_Indicadores_Gestion_Campo_Empresa&sid=1603764966&sct=21&seg=1&_s=9" width="1200" height="1000" scrolling="no" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>-->

<!--<iframe class="embedly-embed" src="//cdn.embedly.com/widgets/media.html?src=https://www.google-analytics.com/g/collect?v=2&tid=G-S4FJY0X3VX&gtm=2oeae2&_p=57538720&sr=1366x768&ul=es-co&cid=1927600930.1602388472&dl=https%3A%2F%2Fdatastudio.google.com%2Fu%2F0%2Freporting%2Fa2b9da07-31a4-423e-ab45-bc1d00f29a1d%2Fpage%2FmM3VB%3Fparams%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580SuperAgro%2522%257D&dr=https%3A%2F%2Fdatastudio.google.com%2Fu%2F0%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB&dt=Copia%20de%20Dashboard_Indicadores_Gestion_Campo_Empresa&sid=1603764966&sct=21&seg=1&_s=9" width="1200" height="1000" scrolling="no" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>-->

<!--<iframe width="1200" height="1000" src="https://datastudio.google.com/embed/reporting/a2b9da07-31a4-423e-ab45-bc1d00f29a1d/page/mM3VB%3Fparams%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580SuperAgro%2522%257D&dr=https%3A%2F%2Fdatastudio.google.com%2Fu%2F0%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB&dt=Copia%20de%20Dashboard_Indicadores_Gestion_Campo_Empresa&sid=1603764966&sct=21&seg=1&_s=9" frameborder="0" style="border:0" width="1200" height="1000" scrolling="no" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>-->

<!--<iframe width="1200" height="1000" src="https://datastudio.google.com/embed/reporting/a2b9da07-31a4-423e-ab45-bc1d00f29a1d/page/mM3VB%3Fparams%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D&dr=https%3A%2F%2Fdatastudio.google.com%2Fu%2F0%2Freporting%2F0c59c96a-7d93-4f3e-9c05-eeea8e946d39%2Fpage%2FmM3VB&dt=Copia%20de%20Dashboard_Indicadores_Gestion_Campo_Empresa&sid=1603764966&sct=21&seg=1&_s=9" frameborder="0" style="border:0" width="1200" height="1000" scrolling="no" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>-->

<!--<iframe class="embedly-embed" src="//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fdatastudio.google.com%2Fu%2F0%2Freporting%2Fa2b9da07-31a4-423e-ab45-bc1d00f29a1d%2Fpage%2FmM3VB%3Fparams%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580SuperAgro%2522%257D" width="1200" height="1000" scrolling="no" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>-->

<iframe class="embedly-embed" src="//cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fdatastudio.google.com%2Fembed%2Freporting%2Fa2b9da07-31a4-423e-ab45-bc1d00f29a1d%2Fpage%2FmM3VB%3Ffbclid%3DIwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc%26params%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D%26feature%3Doembed&dntp=1&display_name=Google+Data+Studio&url=https%3A%2F%2Fdatastudio.google.com%2Freporting%2Fa2b9da07-31a4-423e-ab45-bc1d00f29a1d%2Fpage%2FmM3VB%3Ffbclid%3DIwAR2XCOsj8zcLXEAEP5Ruz548A57UknlXK3Eab-DwAk9SCFwjCtbttXwhABc%26params%3D%257B%2522df9%2522%3A%2522include%2525EE%252580%2525800%2525EE%252580%252580IN%2525EE%252580%252580<?=$usuario->empresa->nombreempresa;?>%2522%257D&image=https%3A%2F%2Fdatastudio.google.com%2Freporting%2Fa2b9da07-31a4-423e-ab45-bc1d00f29a1d%2Fpage%2FmM3VB%2Fthumbnail%3Fsz%3Dw1200-h900-p-nu%26feature%3Doembed&key=internal&type=text%2Fhtml&schema=google" width="1200" height="1400" scrolling="yes" title="Google Data Studio embed" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="true"></iframe>

<!--<iframe id="historyframe" name="historyframe" width="1200" height="1000" src="" frameborder="0" style="border:0" allowfullscreen></iframe>-->


</div>

@endsection


@section('scripts')

<!--<script>
    $(document).ready(function() {

    var idempresa;
    idempresa = document.getElementById("idempresa").value;
    var company_name;
    company_name = document.getElementById("company_name").value;
    console.log(company_name);

     var params1 = {
                           // "ds31.idempresaparm1": company_name
                            "ds31.idempresaparm":idempresa,
                            "ds31.idnameempresa":company_name
                           // "ds9.company_name": company_name,
                           // "ds17.company_name": company_name
                           
                                    };
     console.log(params1);
    var params1AsString = JSON.stringify(params1);
    var encodedParams1 = encodeURIComponent(params1AsString);
    var urlencode=(JSON.stringify(encodedParams1));
    

    var URL2="https://datastudio.google.com/embed/reporting/a2b9da07-31a4-423e-ab45-bc1d00f29a1d/page/mM3VB/?params=" + urlencode.replace(/\"/g, "");

    $('#historyframe').attr('src',URL2);
    console.log(URL2);
    console.log(JSON.stringify(encodedParams1));

	});
</script>-->



@stop

