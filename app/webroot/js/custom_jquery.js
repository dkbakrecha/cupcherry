$(document).ready(function() {
    $('#image-thumb').mouseover(function() {
        // alert('I am Working.');
        $('#show_pic_change').css("display", "block");
    });
    $('#image-thumb').mouseleave(function() {
        // alert('I am Working.');
        $('#show_pic_change').css("display", "none");
    });
    // edit profile dob
    $('#UserProfileDobMonth').wrap("<div class='col-md-5'></div>");
    $('#UserProfileDobDay').wrap("<div class='col-md-3'></div>");
    $('#UserProfileDobYear').wrap("<div class='col-md-4'></div>");
    // end

    // Toggle Group list //
    $('#groupListToggle').click(function(){
            $('#grp-drop-list').toggle();
    });
    $('#joinedGrp').click(function(){
            $('#joinedGrpList').toggle();
    });
    $('#manageGrp').click(function(){
            $('#manageGrpList').toggle();
    });
    
    
    
    
    
    // End //

});

