<script>
    function googleTranslateElementInit() {
     new google.translate.TranslateElement(
                {pageLanguage: 'el'},
                'google_translate_element'
            );
        /*
        To remove the "powered by google",
        uncomment one of the following code blocks.
        NB: This breaks Google's Attribution Requirements:
        https://developers.google.com/translate/v2/attribution#attribution-and-logos
    */

    // Native (but only works in browsers that support query selector)
    if(typeof(document.querySelector) == 'function') {
        document.querySelector('.goog-logo-link').setAttribute('style', 'display: none');
        document.querySelector('.goog-te-gadget').setAttribute('style', 'font-size: 0');
    }

    // If you have jQuery - works cross-browser - uncomment this
    jQuery('.goog-logo-link').css('display', 'none');
    jQuery('.goog-te-gadget').css('font-size', '0');
    }
    </script>
    <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>