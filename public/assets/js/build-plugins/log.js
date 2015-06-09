var logPlugin = ActiveBuild.UiPlugin.extend({
    id: 'build-log',
    css: 'col-lg-12 col-md-12 col-sm-12 col-xs-12',
    title: Lang.get('build_log'),

    init: function(){
        this._super();
    },

    render: function() {
        var container = $('<pre class="ansi_color_bg_black ansi_color_fg_white"></pre>');
        container.css({height: '300px', 'overflow-y': 'auto'});
        container.html(ActiveBuild.buildData.log);

        return container;
    },

    onUpdate: function(e) {
        if (!e.queryData || e.queryData == '') {
            $('#build-log').hide();
            return;
        }

        $('#build-log pre').html(e.queryData.log);
        $('#build-log').show();
    }
});

ActiveBuild.registerPlugin(new logPlugin());
