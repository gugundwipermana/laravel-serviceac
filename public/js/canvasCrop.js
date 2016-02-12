function BoxLayout(obj) {
    this.x = obj.offset().left;
    this.y = obj.offset().top;
    this.width = obj.width();
    this.height = obj.height();
    this.left = obj.position().left;
    this.top = obj.position().top;
}

var vmousedown = "mousedown",
    vmousemove = "mousemove",
    vmouseup = "mouseup";

if("ontouched" in document) {
    vmousedown = "touchstart";
    vmousemove = "touchmove";
    vmouseup = "touchend";
}

$.CanvasCrop = function(options) {
    var opts = $.extend({}, {
        limitOver: 1,
        isMoveOver: false
    }, options),
    el = $(options.cropBox) || $(".cropBox"),
    rot = 0,
    ratio = 1,
    innerRatio = 1,
    warpBox = new BoxLayout(el),
    thumb = options.thumbBox? $(options.thumbBox) : el.find(".thumbBox"),
    thumbBox = new BoxLayout(thumb),
    ImgSrc = options.imgSrc,
    img = new Image(),
    drawArgument = {},
    clipArgument = {
        dx : thumbBox.x - warpBox.x,
        dy : thumbBox.y - warpBox.y,
    },
    visbleCanvas, 
    visbleContext,
    visbleCanvasBox = {
        left: 0,
        top: 0
    },


    CanvasCropInit = function() {
        if(ImgSrc) {
            canvasInit();
            img.src = ImgSrc;

            el.off(".CropDown").on(vmousedown+".CropDown", backgroundMove);
        }
    },

    canvasInit = function() {
        img.onload = function() {
            visbleCanvas = document.createElement("canvas");
            limitOver();
            getScale();
            visbleCanvas.id = "visbleCanvas";
            visbleCanvas.style.position = "absolute";
            visbleContext = visbleCanvas.getContext("2d");

            drawImage();

            setPosition({x:(warpBox.width-visbleCanvas.width)/2, y:(warpBox.height-visbleCanvas.height)/2});
            el.find("#visbleCanvas").remove();
            el.prepend(visbleCanvas);
            img.onload = img.onerror = null;

        }

        img.onerror = function() {
            alert("Gagal load gambar");
        }
    },

    limitOver = function() {
        var w = img.width,
            h = img.height,
            imgRatio = w/h;

        if(imgRatio < 1) {
            h = warpBox.height;
        } else {
            w = warpBox.width;
            h = w/imgRatio;
        }

        innerRatio = h/img.height;
    },

    getScale = function() {
        drawArgument.w = visbleCanvas.width = img.width*innerRatio*ratio;
        drawArgument.h = visbleCanvas.height = img.height*innerRatio*ratio;
    },

    drawImage = function() {
        visbleContext.clearRect(0,0,visbleCanvas.width, visbleCanvas.height);
        visbleContext.drawImage(img, 0,0, drawArgument.w, drawArgument.h);
    },

    setPosition = function(imgDis) {
        var thumbBoxPos = {
            left: thumbBox.x - warpBox.x,
            top: thumbBox.y - warpBox.y,
            right: thumbBox.x - warpBox.x + thumbBox.width,
            bottom: thumbBox.y - warpBox.y + thumbBox.height
        }

        if(opts.isMoveOver) {
            if(thumbBoxPos.left - imgDis.x < 0) {
                imgDis.x = thumbBoxPos.left;
            } else if(thumbBoxPos.right > imgDis.x + visbleCanvas.width) {
                imgDis.x = thumbBoxPos.right - visbleCanvas.width;
            }

            if(thumbBoxPos.top - imgDis.y < 0) {
                imgDis.y = thumbBoxPos.top;
            } else if(thumbBoxPos.bottom > imgDis.y + visbleCanvas.height) {
                imgDis.y = thumbBoxPos.bottom - visbleCanvas.height;
            }
        }

        $(visbleCanvas).css({
            left: imgDis.x,
            top: imgDis.y
        });

        visbleCanvasBox = {
            left: imgDis.x,
            top: imgDis.y
        };

        clipArgument = {
            dx : imgDis.x - thumbBoxPos.left,
            dy : imgDis.y - thumbBoxPos.top
        };

    },

    backgroundMove = function(e) {
        e.preventDefault();
        if(!visbleCanvas) {
            return false;
        }

        var oldBox = new BoxLayout($(visbleCanvas)),
            pagesite = getPagePos(e),
            oldPointer = {
                x: pagesite.pageX,
                y: pagesite.pageY
            };

        this.onselectstart = function() {
            return false;
        }

        $(document).on(vmousemove+".CropMove", function(e) {
            e.preventDefault();
            var pagesite = getPagePos(e),
                disX = pagesite.pageX - oldPointer.x,
                disY = pagesite.pageY - oldPointer.y;
            imgDis =  {
                x: oldBox.left + disX,
                y: oldBox.top + disY
            };

            setPosition(imgDis);

        });

        $(document).on(vmouseup+".CropLeave", function(e) {
            e.preventDefault();
            $(document).off(".CropMove").off(".CropLeave");
        });

    },

    getPagePos = function(evt) {
        return {
            pageX : hasTouch()? evt.originalEvent.touches[0].pageX : evt.pageX,
            pageY : hasTouch()? evt.originalEvent.touches[0].pageY : evt.pageY
        }
    },

    hasTouch = function() {
        return "ontouched" in document;
    },

    canvasTransform = function(options) {

        if(!visbleCanvas) {
            return false;
        }

        var oldWidth = visbleCanvas.width;
        var oldHeight = visbleCanvas.height;

        ratio = typeof options.ratio === "undefined"? ratio : options.ratio;

        //visbleContext.save();
        getScale();
        drawImage();
    };

    


    var returnObj = {
        getDataURL: function(type) {
            var type = type||"png",
                width = thumbBox.width,
                height = thumbBox.height,
                hiddenCanvas = document.createElement("canvas"),
                hiddenContext = hiddenCanvas.getContext("2d");

            hiddenCanvas.width = width;
            hiddenCanvas.height = height;

            hiddenContext.drawImage(visbleCanvas, clipArgument.dx, clipArgument.dy, visbleCanvas.width, visbleCanvas.height);
            return hiddenCanvas.toDataURL('image/'+type);

        },

        scale: function(ratio) {
            canvasTransform({
                ratio: ratio
            });
        }
    }
    
        
    CanvasCropInit();

    return returnObj;
        
}