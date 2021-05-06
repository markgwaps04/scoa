$(document).ready(function() {


    var engine, remoteHost, template, empty;

    $.support.cors = true;

    remoteHost = '/SCOA/public//scoa_feeds';
    template = Handlebars.compile($("#result-template").html());

    engine = new Bloodhound({
        identify: function(o) { return o.id_str; },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name', 'screen_name'),
        dupDetector: function(a, b) { return a.id_str === b.id_str; },
        prefetch: remoteHost + '/search',
        remote: {
            url: remoteHost + '/search/%QUERY',
            wildcard: '%QUERY'
        }
    });


    function engineWithDefaults(q, sync, async) {

            engine.search(q, sync, async);

    }

    $('.scoa-textarea').typeahead({
        hint: $('.Typeahead-hint'),
        menu: $('.Typeahead-menu'),
        minLength: 0,
        classNames: {
            open: 'is-open',
            empty: 'is-empty',
            cursor: 'is-active',
            suggestion: 'Typeahead-suggestion',
            selectable: 'Typeahead-selectable'
        }
    }, {
        source: engineWithDefaults,
        displayKey: 'path',
        hint: true,
        minLength: 5,
        templates: {
            suggestion: template,
            empty: empty
        }
    }).on('typeahead:selected', function (obj, datum) {
        $('.typeahead').val(datum.Firstname);
    });

});