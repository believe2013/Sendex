Sendex.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,items: [{
            html: '<h2>'+_('sendex')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header container'
        },{
            xtype: 'modx-tabs'
            ,bodyStyle: 'padding: 10px'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                // Имя вкладки
                title: _('sendex_newsletters')
                // Массив с содержимым
                ,items: [{
                    // Блок HTML с описанием этой вкладки
                    html: _('sendex_newsletters_intro')
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                    ,bodyStyle: 'margin-bottom: 10px'
                },
                    // Вызов рабочей таблицы
                {
                    xtype: 'sendex-grid-newsletters'
                    ,preventRender: true
                }]
            },{
                title: _('sendex_queues')
                ,items: [{
                    html: _('sendex_queue_intro')
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                    ,bodyStyle: 'margin-bottom: 10px'
                },{
                    xtype: 'sendex-grid-queues'
                    ,preventRender: true
                }]
            }]
        }]
    });
    Sendex.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(Sendex.panel.Home,MODx.Panel);
Ext.reg('sendex-panel-home',Sendex.panel.Home);
