'use strict';

let StickySidebar = function () {
    // Default options
    const DEFAULTS = {
        /**
         * @type {String}
         * Sidebar inner element selector.
         */
        sidebarInner: '.sidebar__inner',

        /**
         * @type {Number}
         * Additional top spacing of the element when it becomes sticky.
         */
        topGap: 20,

        /**
         * @type {Number}
         * Additional gaps of the element when it becomes sticky.
         */
        bottomGap: 20,
    };

    // Parameters
    let sidebarInner;
    let topGap;
    let bottomGap;
    let pageScrollX;
    let pageScrollY;
    let sidebarMode;
    let sidebarTopCoord;
    let sidebarBottomCoord;
    let innerTopCoord;
    let innerBottomCoord;
    let currScroll;
    let lastScroll = 0;

    // Functions
    function getRect(elem) {
        const rect = elem.getBoundingClientRect();
        return {
            top: Math.floor(rect.top + pageScrollY),
            left: Math.floor(rect.left + pageScrollX + 0.5),
            width: elem.offsetWidth - 0.5,
            height: elem.offsetHeight,
        };
    }

    function stylize(elem, {
        position = '',
        width = '',
        top = '',
        bottom = '',
        left = '',
    }) {
        elem.style.position = position;
        elem.style.width = width;
        elem.style.top = top;
        elem.style.bottom = bottom;
        elem.style.left = left;
    }

    function extend(defaults, options) {
        let results = {};
        for (let key in defaults) {
            (typeof options[key] !== 'undefined') ? results[key] = options[key] : results[key] = defaults[key];
        }
        return results;
    }

    class StickySidebar {
        /**
         * @constructor
         * Sticky sidebar constructor
         * @param {HTMLElement|String} sidebar - The sidebar element or sidebar selector.
         * @param {Object} options - The options of sticky sidebar.
        */
        constructor(sidebar) {
            // Sidebar
            this.sidebar = (typeof sidebar === 'string') ? document.querySelector(sidebar) : sidebar;
            if (this.sidebar === null) throw new Error('Incorrect sidebar value.');
            // Options
            let options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
            this.options = extend(DEFAULTS, options);

            sidebarInner = this.sidebar.querySelector(this.options.sidebarInner);
            if (sidebarInner === null) throw new Error(`${this.options.sidebarInner} is not defined.`);
            topGap = this.options.topGap;
            bottomGap = this.options.bottomGap;

            this._initialize();
        }

        /** @private */
        _initialize() {
            window.addEventListener('scroll', this._hundler.bind(this));
            window.addEventListener('resize', this._hundler.bind(this));
            window.scrollBy({
                top: 1,
            })
            window.scrollBy({
                top: -1,
            })
        }

        /** @private */
        _hundler() {
            if (getComputedStyle(sidebarInner).position === 'static') {
                return
            }
            pageScrollX = Math.floor(scrollX);
            pageScrollY = Math.floor(scrollY);
            sidebarTopCoord = getRect(this.sidebar).top;
            sidebarBottomCoord = sidebarTopCoord + getRect(this.sidebar).height;
            innerTopCoord = getRect(sidebarInner).top;
            innerBottomCoord = innerTopCoord + getRect(sidebarInner).height;

            if (pageScrollY <= sidebarTopCoord - topGap) {
                this._changePosition('start');
            } else if (pageScrollY > sidebarTopCoord - topGap && innerBottomCoord < sidebarBottomCoord || pageScrollY < innerTopCoord - topGap) {
                this._changePosition('middle');
            } else if (innerBottomCoord >= sidebarBottomCoord) {
                this._changePosition('end');
            }
        }

        /** @private */
        _changePosition(position) {
            switch (position) {
                case 'start':
                    stylize(sidebarInner, {
                        position: 'relative',
                    });
                    break;
                case 'middle':
                    sidebarMode = (getRect(sidebarInner).height + topGap + bottomGap >= window.innerHeight) ?
                        'full' : '';
                    if (sidebarMode === 'full') {
                        let innerRelativeTopCoord = getRect(sidebarInner).top - getRect(this.sidebar).top;

                        stylize(sidebarInner, {
                            position: 'relative',
                            top: `${innerRelativeTopCoord}px`,
                        });

                        currScroll = scrollY;
                        if (currScroll > lastScroll) {
                            // Scroll down
                            lastScroll = currScroll;
                            if (pageScrollY + window.innerHeight - bottomGap >= innerBottomCoord) {
                                stylize(sidebarInner, {
                                    position: 'fixed',
                                    width: `${getRect(this.sidebar).width}px`,
                                    bottom: `${bottomGap}px`,
                                    left: `${getRect(this.sidebar).left}px`,
                                });
                            }
                        } else {
                            // Scroll up
                            if (pageScrollY <= innerTopCoord - topGap) {
                                stylize(sidebarInner, {
                                    position: 'fixed',
                                    width: `${getRect(this.sidebar).width}px`,
                                    top: `${topGap}px`,
                                    left: `${getRect(this.sidebar).left}px`,
                                });
                            }
                        }
                        lastScroll = currScroll;
                    } else {
                        stylize(sidebarInner, {
                            position: 'fixed',
                            width: `${getRect(this.sidebar).width}px`,
                            top: `${topGap}px`,
                            left: `${getRect(this.sidebar).left}px`,
                        });
                    }
                    break;
                case 'end':
                    stylize(sidebarInner, {
                        position: 'relative',
                        top: `${Math.floor(getRect(this.sidebar).height - getRect(sidebarInner).height)}px`,
                    });
                    break;
            }
        }
    }
    return StickySidebar;
}();