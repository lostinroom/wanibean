$(document).ready(function() {
    var liElement = $('#listOfThumbs>li').first();
    var totElement = $('#listOfThumbs>li').length;
    var curLiElement = liElement;
    var interval;
    var delayTime = 5000;
    var position = 510;
    
    var activeThumbs = function (curElement) {
        curElement.addClass('activeThumbs');
        
        $('#displayImg').fadeOut(500, function() {
            $(this).attr({'src':curElement.find('img').attr('src')});
            if (this.complete) $(this).fadeIn(500);
        });
    }
    
    var next = function () {
        index = $('#listOfThumbs>li').index(curLiElement);
                
        curLiElement.removeClass('activeThumbs');
        if (index == totElement-1) {
            curLiElement = $('#listOfThumbs>li').first();
            
            $('#listOfThumbs').animate({'left':'0px'}, "slow");
        } else {
            curLiElement = curLiElement.next();
            
            if (Math.floor(index/3) != Math.floor((index+1)/3)) {
                leftPos = Math.floor((index+1)/3) * position;
                leftPos = "-" + leftPos + "px";
                $('#listOfThumbs').animate({'left':leftPos}, "slow");
            }
        }
        activeThumbs(curLiElement);
    };
    
    var prev = function () {
        index = $('#listOfThumbs>li').index(curLiElement);
                
        curLiElement.removeClass('activeThumbs');
        if (index == 0) {
            curLiElement = $('#listOfThumbs>li').last();
            leftPos = Math.floor(totElement/3) * position;
            leftPos = "-" + leftPos + "px";
            
            $('#listOfThumbs').animate({'left':leftPos}, "slow");
        } else {    
            curLiElement = curLiElement.prev();
            
            if (Math.floor(index/3) != Math.floor((index-1)/3)) {
                leftPos = Math.floor((index-1)/3) * position;
                leftPos = "-" + leftPos + "px";
                $('#listOfThumbs').animate({'left':leftPos}, "slow");
            }
        }    
        activeThumbs(curLiElement);
    };
    
    $('#listOfThumbs').width(Math.ceil(totElement/3)*520);
    
    //set which one is active thumb and display image
    curLiElement.addClass('activeThumbs');
    $('#displayImg').attr('src', curLiElement.find('img').attr('src'));

    interval = setInterval(next, delayTime);
        
    //add function when users click thumb
    $('#listOfThumbs>li>a').click(function() {
        curLiElement.removeClass('activeThumbs');
        curLiElement = $(this).parent();
        activeThumbs(curLiElement);
    });

    $('#displayContainer>a').click(function() {
        
    });

    $("#prev-nav").hover(
        function() {
            $(this).append('<a href="javascript:void(0)" id="prev"><img src="images/left-arrow.png" /></a>');
            $('#prev-nav>a').click(function() {
                prev();
            });
        }, function() {
            $('#prev').remove();
        }
    );
    
    $("#next-nav").hover(
        function() {
            $(this).append('<a href="javascript:void(0)" id="next"><img src="images/right-arrow.png" /></a>');
            
            $('#next-nav>a').click(function() {
                next();
            });
        }, function() {
            $('#next').remove();
        }
    );
});