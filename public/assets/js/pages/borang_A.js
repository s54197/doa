
$(document).ready(function(){

    var noSteps = $("#wizard-vertical").find("h3").length;
    // properties of jquery step element
    $("#wizard-vertical").steps({
        labels: {
            next: "Teruskan",
            previous: "Sebelum"
        },
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "fade",
        stepsOrientation: "vertical",
        enableFinishButton: false,
        // change step if last step display draft and submit button else remove both
        onStepChanged:function (event, currentIndex, newIndex) {
            if(currentIndex == noSteps-1){
                var submit = $("<a>").attr("href","javascript:void(0)").attr("id","daftar_borangA").addClass("submitBtn").text("Daftar");
                // var submitSpinner = submit.append("<div class='spinner-border spinner-border-sm text-light ml-1' role='status' id='spinner_submit_patient_form' style='display: none'><span class='sr-only'>Loading...</span></div>");
                // var draft = $("<a>").attr("href","javascript:void(0)").attr("id","draft_patient_form").addClass("btn_form_draft draftBtn").text("Save Draft");
                // var draftSpinner = draft.append("<div class='spinner-border spinner-border-sm text-light ml-1' role='status' id='spinner_draft_patient_form' style='display: none'><span class='sr-only'>Loading...</span></div>");
                var submitBtn = $("<li>").attr("aria-disabled",false).append(submit);
                // var draftBtn = $("<li>").attr("aria-disabled",false).append(draftSpinner);
                // $(document).find(".actions ul").append(draftBtn)
                $(document).find(".actions ul").append(submitBtn)
            }else{
                $(".actions").find(".submitBtn").remove();
                // $(".actions").find(".draftBtn").remove();
            }
            return true;
        },
    });
    // on Save button click
    $(".actions").on("click",".submitBtn",function(){
        $("#spinner_submit_patient_form").show();
        // replace submit form route with laravel route
        // $("#form_patient").attr('action', "<submit form route>");   
        $("#wizard-vertical").submit();
    });
    
});