window.Switcher = function switcher() {

    // Simple function that replaces the existing locale with a new one
    // e.g. replace en/ with da/
    let setLocalURL = function(locale, langs) {
        let url = window.location.href;
        current_locale = getLocale(langs);
        return url.replace(current_locale, locale);
    }

    // Simple function that finds the existing locale, e.g. en/
    let getLocale = function(langs) {
        let locale = 'en/';
        let url = window.location.href;
        langs.forEach(function(lang) {
            if (url.includes(lang)) {
                locale = lang;
            }
        });
        return locale;
    }

    this.init = function() {
        // Language switcher
        let langArray = [];
        let langObj = {};
        let langs = [];

        // Building the language switcher from the select options
        $('.lang-switcher option').each(function(){
        let flag_icon = "flag-icon-" + $(this).attr("data-flag");
        let text = this.innerText;
        let value = $(this).attr('value');
        let item = '<li value="' + value + '" data-flag="' + $(this).attr("data-flag") + '"><span class="flag-icon ' + flag_icon + '"></span><span>'+ text +'</span></li>';
        langArray.push(item);
        langObj[value + '/'] = item;
        langs.push(value + '/');
        })

        $('#lang-a').html(langArray);

        // Initial population of the langauge switcher
        let locale = getLocale(langs);
        $('.lang-button').html(langObj[locale]);
        $('.lang-button').attr('value', locale.replace('/', ''));

        //change button stuff on click
        $('#lang-a li').on('click', function(e) {
            let value = $(this).attr('value');
            let text = this.innerText;
            let flag_icon = "flag-icon-" + $(this).attr("data-flag");
            var item = '<li value="' + value + '"><span class="flag-icon ' + flag_icon + '"></span><span>'+ text +'</span></li>';
        $('.lang-button').html(item);
        $('.lang-button').attr('value', value);
        $(".lang-b").toggle();
        window.location.href = setLocalURL(value + '/', langs)
        });

        $('.lang-button').on('click', function(e) {
            $(".lang-b").toggle();
        });
    }
}
