// Custom cursor
    function handleCustomCursor() {
        if ( $('body').hasClass( 'custom-cursor' ) ) {
            const cursorInnerEl = document.querySelector('.circle-cursor--inner');
            const cursorOuterEl = document.querySelector('.circle-cursor--outer');
            let lastY, lastX = 0;
            let magneticFlag = false;

            // move
            window.onmousemove = function (event) {
                if (!magneticFlag) {
                    cursorOuterEl.style.transform = 'translate('+ event.clientX + 'px, ' + event.clientY + 'px' +')';
                }
                cursorInnerEl.style.transform = 'translate('+ event.clientX + 'px, ' + event.clientY + 'px' +')';
                lastY = event.clientY;
                lastX = event.clientX;
            }

            // links hover
            $('body').on('mouseenter', 'a, .cursor-as-pointer', function() {
                cursorInnerEl.classList.add('cursor-link-hover');
                cursorOuterEl.classList.add('cursor-link-hover');
            });
            $('body').on('mouseleave', 'a, .cursor-as-pointer', function() {
                if ( $(this).is('a') && $(this).closest('.cursor-as-pointer').length ) {
                    return;
                }
                cursorInnerEl.classList.remove('cursor-link-hover');
                cursorOuterEl.classList.remove('cursor-link-hover');
            });

            // additional hover cursor class
            $('body').on('mouseenter', '[data-cursor-class]', function() {
                const cursorClass = $(this).attr('data-cursor-class');

                if (cursorClass.indexOf('dark-color') != -1) {
                    cursorInnerEl.classList.add('dark-color');
                    cursorOuterEl.classList.add('dark-color');
                }

                if (cursorClass.indexOf('cursor-link') != -1) {
                    cursorInnerEl.classList.add('cursor-link');
                    cursorOuterEl.classList.add('cursor-link');
                }
            });
            $('body').on('mouseleave', '[data-cursor-class]', function() {
                const cursorClass = $(this).attr('data-cursor-class');
                if (cursorClass.indexOf('dark-color') != -1) {
                    cursorInnerEl.classList.remove('dark-color');
                    cursorOuterEl.classList.remove('dark-color');
                }

                if (cursorClass.indexOf('cursor-link') != -1) {
                    cursorInnerEl.classList.remove('cursor-link');
                    cursorOuterEl.classList.remove('cursor-link');
                }
            });

            // magnet elements
            $('body').on('mouseenter', '.cursor-magnet, .btn-round', function() {
                const $elem = $(this);
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                cursorOuterEl.style.transition = 'all .2s ease-out';
                cursorOuterEl.style.transform = 'translate('+ $elem.offset().left + 'px, ' + ($elem.offset().top - scrollTop) + 'px' +')';

                /*Old code*/
                cursorOuterEl.style.width = $elem.width() + 'px';
                cursorOuterEl.style.height = $elem.height() + 'px';
                cursorOuterEl.style.marginLeft = 0;
                cursorOuterEl.style.marginTop = 0;

                magneticFlag = true;
            });

            $('body').on('mouseleave', '.cursor-magnet, .btn-round', function() {
                cursorOuterEl.style.transition = null;
                cursorOuterEl.style.width = null;
                cursorOuterEl.style.height = null;
                cursorOuterEl.style.marginLeft = null;
                cursorOuterEl.style.marginTop = null;

                magneticFlag = false;
            });

            //iframe fix
            $('body').on('mouseenter', 'iframe', function() {
                cursorOuterEl.style.visibility = 'hidden';
                cursorInnerEl.style.visibility = 'hidden';
            });
            $('body').on('mouseleave', 'iframe', function() {
                cursorOuterEl.style.visibility = 'visible';
                cursorInnerEl.style.visibility = 'visible';
            });
            
            cursorInnerEl.style.visibility = 'visible';
            cursorOuterEl.style.visibility = 'visible';
        }
    }

