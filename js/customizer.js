;(function($) {

    /** Customize Model */
    window.CustomizeModel = Backbone.Model.extend({

        defaults: {
            selector: null,
            property: null,
            value: null
        }

    });

    /** Customize Collection */
    window.CustomizeCollection = Backbone.Collection.extend({

        model: CustomizeModel

    });

    /** Customize View */
    window.CustomizeView = Backbone.View.extend({

        initialize: function() {

            var self = this,
                $items = {};

            /** Set the element */
            this.$el = this.options.$el;

            /** Change event */
            this.collection.on('change', function() {

                /** Reflect changes in view */
                _.each(this.collection.models, function(model) {

                    /** Get our essentials */
                    var css = {},
                        selector = model.get('selector'),
                        property = model.get('property'),
                        value = model.get('value');

                    /** Do validation */
                    if ( property == 'background-image' )
                        value = 'url('+ value +')';
                    if ( property == 'height' && selector == '.rivasliderlite-arrows' )
                        $('.rivasliderlite-next').css({ 'background-position': '0 -'+ value +'px' }); 

                    /** Populate CSS & apply it*/
                    css[ property ] = value;
                    $(selector).css(css);

                });

                console.log( this.collection );

                /** Store values */
                //$('#customizations').val(JSON.stringify(this.collection.toJSON()));

            }, this);

            /** Title click functionality */
            $('.customize-section-title').on('click', function() {

                /** Cache self */
                var $parent = $(this).parent();

                /** Show/hide the tab */
                if ( !$parent.hasClass('open') ) {
                    $('.customize-section').removeClass('open');
                    $parent.addClass('open');
                }
                else
                    $('.customize-section').removeClass('open');

            });

            /** Collapse function */
            $('.collapse-sidebar').on('click', function() {

                /** Cache overlay */
                var $overlay = $('.wp-full-overlay');

                /** Collapse/expand */
                if ( $overlay.hasClass('expanded') )
                    $overlay.removeClass('expanded').addClass('collapsed');
                else
                    $overlay.removeClass('collapsed').addClass('expanded');
                
            });
            
            /** Create an item view for each field */
            $('.field').each(function(index) {

                /** Get the model */
                var $self = $(this),
                    model = new CustomizeModel(),
                    view;

                /** Add to the collection */
                self.collection.add(model);

                /** Set some attributes */
                model.set({
                    selector: $self.attr('data-selector'),
                    property: $self.attr('data-property'),
                    value: $self.val()
                });

                /** Create an item view */
                view = new ItemView({
                    $el: $self,
                    model: model
                });

                /** Setup colour pickers */
                if ( $self.hasClass('color-picker-hex') ) {
                    $self.wpColorPicker({
                        change: function(e) {
                            view.change(e);
                        },
                        defaultColor: $self.attr('data-default')
                    });
                }

            });

        },

        render: function() {

            /** Show the view */
            this.$el.find('.wp-full-overlay').animate({ 'opacity': 1 }, { duration: 200 });

        }

    });

    /** Customization item View */
    window.ItemView = Backbone.View.extend({

        events: {
            'change': 'change'
        },

        initialize: function() {
            this.$el = this.options.$el;
        },

        change: function(e) {

            /** Set model attribute */
            var target = e.target,
                change = {};
            change.value = target.value;
            this.model.set(change);

        }

    });

    /** Let's go! */
    $(document).ready(function() {
        window.customizeView = new CustomizeView({
            $el: $('#customize-container'),
            collection: new CustomizeCollection(JSON.parse($('#customizations').val()))
        }).render();
    });

})(jQuery);