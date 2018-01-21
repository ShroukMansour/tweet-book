$(function () {
   var tweetInfo = $("#tweet-info");
   var tweetPost = $('#tweet-post');

    $.post( "../../controllers/PostController.php", { func: "getNameAndTime" }, function( data ) {
        console.log( data.name ); // John
        console.log( data.time ); // 2pm
    }, "json");
});