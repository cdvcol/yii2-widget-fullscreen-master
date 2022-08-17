(function ($) {
    var WidgetFullScreen = function (options) {
        this.init(options);
    };
    WidgetFullScreen.prototype = {
        _target: $(),
        _document: $(document).get(0),
        init: function (options) {
            this._target = options._target;
            this.options = options;
            this.registerListeners();
        },
        registerListeners: function () {
            this._target.on("click", this.options.selectorToggle, $.proxy(this.toggleFullScreen, this));
        },
        toggleFullScreen: function () {
            this._target.find(this.options.selectorFullScreen).each(
                (i, el) => el.addEventListener("fullscreenchange", $.proxy(this.onFullScreenChange, this), { once: true }));

            this.isInFullscreen ? this.exitFullScreen() : this.requestFullScreen();
        },
        requestFullScreen: function () {
            const fullscreenElement = this._target.find(this.options.selectorFullScreen).get(0);
            if (!fullscreenElement) {
                return false;
            }
            return fullscreenElement.requestFullscreen
                ? fullscreenElement
                    .requestFullscreen()
                    .catch(err => alert(`Error attempting to enable full-screen mode: ${err.message} (${err.name})`))
                : fullscreenElement.webkitRequestFullscreen();
        },
        exitFullScreen: function () {
            return this._document.exitFullscreen
                ? this._document.exitFullscreen()
                    .catch((err) => console.error(err))
                : this._document.webkitRequestFullscreen();
        },
        get isInFullscreen() {
            return this._document.fullscreenElement || this._document.webkitFullscreenElement;
        },
        onFullScreenChange: function (e) {
            const isInFullScreen = this.isInFullscreen;
            this._target.find(`${this.options.selectorToggle} i`).toggleClass(`${this.options.iconExpand} ${this.options.iconCollapse}`);
            this._target.trigger(`fullscreen-${isInFullScreen ? 'enter' : 'exit'}`);
            this._target.find(this.options.selectorFullScreen).toggleClass(this.options.classOverflowScroll, isInFullScreen);
        }
    };
    $.fn.widgetFullScreen = function (option) {
        var args = arguments;
        return this.each(function () {
            var data = $(this).data("WidgetFullScreen");
            var options = typeof option === "object" ? option : {};
            if (data === undefined) {
                var defaultOptions = $.extend(true, {}, $.fn.widgetFullScreen.defaults);
                options._target = $(this);
                $(this).data("WidgetFullScreen", (data = new WidgetFullScreen(
                    $.extend(defaultOptions, options)
                )));
            }
            if (typeof option === "string") { //call method
                data[option].apply(data, Array.prototype.slice.call(args, 1));
            }
        });
    };
})(jQuery);