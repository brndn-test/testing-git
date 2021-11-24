jQuery(document).ready(function ($) {
    $.ajax({
        type: "GET",
        url: document.querySelector("#marquee_container_").getAttribute("data-template-url") + "/services/media.json",
        dataType: "json",
        success: setMarqueeData,
    });

    function setMarqueeData(data) {
        var maxMediaElements = 10;
        var shuffledImages = shuffleArray(data.images);
        var shuffledVideos = shuffleArray(data.videos);
        var media = [];
        var unused = [];
        var mobile = [];

        shuffledImages.forEach((image, iIndex) => {
            if (iIndex < maxMediaElements) {
                media.push(image);
            } else {
                unused.push(image);
            }
            mobile.push(image);
        });
        shuffledVideos.forEach((video, vIndex) => {
            if (vIndex < maxMediaElements) {
                media.push(video);
            } else {
                unused.push(video);
            }
            mobile.push(video);
        });

        var shuffledMedia = shuffleArray(media);
        var shuffledUnused = shuffleArray(unused);
        var shuffledMobile = shuffleArray(mobile);
        if (document.body.clientWidth >= 960) {
            initMarquee(shuffledMedia, shuffledUnused);
        } else {
            initMarqueeMobile(shuffledMobile);
        }
    }

    function initMarquee(media, unused) {
        var marqueeContent = document.querySelector("#marquee-content");
        marqueeContent.setAttribute("data-video-width", "0");
        marqueeContent.className += " h-100";

        media.forEach((element, eIndex) => {
            var div = document.createElement("div");
            div.className = "marquee-item mr3 overflow-hidden";
            div.setAttribute("data-marquee-index", eIndex);
            div.setAttribute("data-width", "0");

            var helper = document.createElement("div");
            helper.className = "marquee-helper absolute w-100 h-100 flex items-center justify-center hide-child bg-near-white o-70";
            var helperText = document.createElement("p");
            helperText.className = "w-80 child beatrice f-14 tc ttu";
            helperText.textContent = "No hay más contenido relacionado.";
            helper.appendChild(helperText);
            div.appendChild(helper);

            createItem(div, element, eIndex, media, unused);
            marqueeContent.appendChild(div);
        });
        // clones with all event handlers
        media.forEach((clone, cIndex) => {
            var div = document.createElement("div");
            if (cIndex == 0) div.setAttribute("id", "first-clone");
            div.className = "marquee-item mr3 overflow-hidden";
            div.setAttribute("data-marquee-index", cIndex);
            div.setAttribute("data-width", "0");

            var helper = document.createElement("div");
            helper.className = "marquee-helper absolute w-100 h-100 flex items-center justify-center hide-child bg-near-white o-70";
            var helperText = document.createElement("p");
            helperText.className = "w-80 child beatrice f-14 tc ttu";
            helperText.textContent = "No hay más contenido relacionado.";
            helper.appendChild(helperText);
            div.appendChild(helper);

            createItem(div, clone, cIndex, media, unused);
            marqueeContent.appendChild(div);
        });

        startMarquee(2);
    }

    function createItem(container, element, eIndex, media, unused) {
        var templateUrl = document.querySelector("#marquee_container_").getAttribute("data-template-url") + "/";
        var elementType = element.type === "image" ? "img" : "video";
        var content = document.createElement(elementType);
        if (elementType === "video") {
            content.addEventListener("canplay", function () {
                resizeItem(content, container, true);
            });
        } else {
            content.addEventListener("load", function () {
                resizeItem(content, container, false);
            });
        }
        content.setAttribute("src", templateUrl + element.url);
        content.className = "marquee-img h-100";
        if (elementType === "video") {
            content.muted = true;
            content.loop = true;
            content.playsinline = true;
            content.autoplay = true;
        }
        container.appendChild(content);

        content.addEventListener("click", function () {
            var tagIndex = element.tags.length > 1 ? Math.floor(Math.random() * element.tags.length) : 0;
            replaceItem(element.tags[tagIndex], eIndex, media, unused);
        });
    }

    function replaceItem(tag, index, media, unused) {
        var newItem = null;
        for (var i = 0; i < unused.length; i++) {
            if (unused[i].tags.indexOf(tag) != -1) {
                var removedItem = unused.splice(i, 1);
                newItem = removedItem[0];
                break;
            }
        }

        var current = document.querySelectorAll("div[data-marquee-index='" + index + "']");
        current.forEach((element) => {
            if (newItem != null) {
                var currentContent = element.querySelector(".marquee-img");
                element.removeChild(currentContent);
                createItem(element, newItem, index, media, unused);
            } else {
                var currentHelper = element.querySelector(".marquee-helper");
                currentHelper.style.zIndex = "999";
            }
        });
    }

    function resizeItem(content, container, isVideo) {
        var marqueeContent = document.querySelector("#marquee-content");
        var contentWidth = content.clientWidth;
        var resize = 0;
        var currentContainerWidth = parseInt(container.getAttribute("data-width"), 10);
        if (currentContainerWidth == 0) {
            resize = contentWidth;
            var marqueeVideoWidth = parseInt(marqueeContent.getAttribute("data-video-width"), 10);
            if (isVideo && marqueeVideoWidth == 0) {
                marqueeContent.setAttribute("data-video-width", contentWidth);
            }
        } else {
            if (isVideo) {
                var marqueeVideoWidth = parseInt(marqueeContent.getAttribute("data-video-width"), 10);
                resize = marqueeVideoWidth;
            } else {
                var difference = marqueeContent.clientHeight / content.naturalHeight;
                resize = content.naturalWidth * difference;
                //content.style.width = resize + "px";
            }
        }
        container.style.width = resize + "px";
        container.setAttribute("data-width", resize);
    }

    function startMarquee(speed) {
        setInterval(function () {
            var marqueeContent = document.querySelector("#marquee-content");
            var marqueeTranslated = parseInt(marqueeContent.getAttribute("data-translated"), 10);
            var firstClone = marqueeContent.querySelector("#first-clone");
            var viewportDistance = firstClone.getBoundingClientRect().left;

            if (viewportDistance <= 0) marqueeTranslated = 0;

            marqueeTranslated -= speed;
            marqueeContent.style.transform = "translateX(" + marqueeTranslated + "px)";
            marqueeContent.setAttribute("data-translated", marqueeTranslated);
        }, 25);
    }

    function initMarqueeMobile(media) {
        var marqueeMobile = document.querySelector("#marquee-mobile");
        var index = 0;

        marqueeMobile.setAttribute("data-marquee-buffer", index);
        marqueeMobile.className += " h-100";
        appendMobileItem(media);
        appendMobileItem(media); // item for buffer
    }

    function appendMobileItem(media) {
        var marqueeMobile = document.querySelector("#marquee-mobile");
        var viewportWidth = document.body.clientWidth;
        var marqueeBuffer = parseInt(marqueeMobile.getAttribute("data-marquee-buffer"), 10);

        var div = createMobileItem(media[marqueeBuffer]);
        div.setAttribute("data-item-index", marqueeBuffer);
        addEventListenerOnce(div, "click", function () {
            var marqueeItems = marqueeMobile.querySelectorAll(".mobile-item").length;
            var itemIndex = parseInt(div.getAttribute("data-item-index"), 10);
            itemIndex++;
            if (itemIndex < marqueeItems) {
                marqueeMobile.style.transform = "translateX(" + -viewportWidth * itemIndex + "px)";
            } else {
                // alert("No quedan más imágenes para mostrar.");
                var helper = document.createElement("div");
                helper.className = "absolute w-100 h-100 flex items-center justify-center bg-near-white o-70";
                helper.style.zIndex = "999";
                var helperText = document.createElement("p");
                helperText.className = "w-80 beatrice f-18 tc ttu";
                helperText.textContent = "No hay más contenido para mostrar.";
                helper.appendChild(helperText);
                div.appendChild(helper);
            }
            var nextBuffer = parseInt(marqueeMobile.getAttribute("data-marquee-buffer"), 10);
            if (nextBuffer < media.length) appendMobileItem(media);
        });

        marqueeMobile.appendChild(div);
        marqueeMobile.setAttribute("data-marquee-buffer", ++marqueeBuffer);
    }

    function createMobileItem(element) {
        var templateUrl = document.querySelector("#marquee_container_").getAttribute("data-template-url") + "/";
        var div = document.createElement("div");
        div.className = "mobile-item h-100 flex overflow-hidden justify-center items-center";
        var elementType = element.type === "image" ? "img" : "video";
        var content = document.createElement(elementType);
        // handles vertical images
        content.addEventListener("load", function () {
            var contentWidth = content.clientWidth;
            var viewportWidth = document.body.clientWidth;
            if (contentWidth < viewportWidth) {
                var contentHeight = content.clientHeight;
                var difference = contentWidth / viewportWidth;
                content.className = content.className.replace("h-100", "w-100");
                content.style.height = contentHeight / difference + "px";
            }
        });
        content.setAttribute("src", templateUrl + element.url);
        content.className = "h-100";
        if (elementType === "video") {
            content.muted = true;
            content.loop = true;
            content.playsinline = true;
            content.autoplay = true;
        }
        div.appendChild(content);

        return div;
    }

    function shuffleArray(array) {
        var shuffledArray = array
            .map((item) => ({ item, sort: Math.random() }))
            .sort((a, b) => a.sort - b.sort)
            .map((shuffledItem) => shuffledItem.item);

        return shuffledArray;
    }

    function addEventListenerOnce(element, event, callback) {
        var fn = function () {
            element.removeEventListener(event, fn);
            callback();
        };
        element.addEventListener(event, fn);
    }
});
