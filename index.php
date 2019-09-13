<object id="cadesplugin" type="application/x-cades" class="hiddenObject"></object>
<script language="javascript">window.allow_firefox_cadesplugin_async=1</script>
<script language="javascript" src="https://www.cryptopro.ru/sites/default/files/products/cades/es6-promise.min.js"></script>
<script language="javascript" src="https://www.cryptopro.ru/sites/default/files/products/cades/demopage/ie_eventlistner_polyfill.js"></script>
<script language="javascript" src="www.vod12.ru/abonents/techconditions/cadesplugin_api.js"></script>
<script language="javascript" src="www.vod12.ru/abonents/techconditions/Code.js"></script>
<script language="javascript" src="www.vod12.ru/abonents/techconditions/async_code.js"></script>
123

<script language="javascript">
    function run()
    {
        var ProviderName = "Crypto-Pro GOST R 34.10-2001 Cryptographic Service Provider";
        var ProviderType = 75;

        var elem = document.getElementById("ProviderName");
        var ProviderName = elem.value;

        elem = document.getElementById("ProviderType");
        var ProviderType = elem.value;

        var Version = get_version(ProviderName, ProviderType);

        elem = document.getElementById("ProviderVersion");

        if(Version)
            elem.value = Version;
    }

    function get_version(ProviderName, ProviderType)
    {
        var oVersion;
        try
        {
            var oAbout = cadesplugin.CreateObject("CAdESCOM.About");

            oVersion= oAbout.CSPVersion(ProviderName, parseInt(ProviderType, 10));

            var Minor = oVersion.MinorVersion;
            var Major = oVersion.MajorVersion;
            var Build = oVersion.BuildVersion;
            var Version = oVersion.toString();

            return Version;
        }
        catch(er)
        {
            if(er.message.indexOf("0x80090019")+1)
                return "Óêàçàííûé CSP íå óñòàíîâëåí";
            else
                return er.message;
            return false;
        }
    }
</script>
