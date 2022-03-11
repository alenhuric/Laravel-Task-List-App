<script src="{{asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/plugins/parsley/dist/parsley.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment-timezone-with-data.js')}}"></script>

<script type="text/javascript">
$(document).ready(function() {
//parsely validation with start and end date
   $('#submit').on('click', function(e, anchorObject, stepNumber, stepDirection) {

        var res = $('form[name="form-create-task"]').parsley().validate('step-member');
        return res;
    });
});

//changing parsely error block
var parsleyConfig = {
    errorsContainer: function(pEle) {
        var $err = pEle.$element.siblings('.error-block');
        return $err;
    }
}
$('#myForm').parsley(parsleyConfig);
$('#myForm').parsley({
  successClass: 'has-success',
  errorClass: 'has-error',
  classHandler: function(el) {
    return el.$element.closest(".error-block");
  },
  errorsContainer: function(el) {
    return el.$element.closest('.error-block');
},
  errorsWrapper: '<span class="help-block"></span>',
  errorTemplate: "<span></span>"
});

var b = moment.tz("America/Chicago").format();
    $('.datepicker-default').datepicker({
        locale: 'en-gb',
      timeZone: 'America/Chicago',
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,        
    })
        .on('changeDate', function(e) {
        $(this).parsley().validate();
        });

$('textarea').keyup(function() {
    
  var characterCount = $(this).val().length,
      current = $('#current'),
      maximum = $('#maximum'),
      theCount = $('#the-count');
    
  current.text(characterCount);
 
  
  /*This isn't entirely necessary, just playin around*/
  if (characterCount < 70) {
    current.css('color', '#666');
  }
  if (characterCount > 70 && characterCount < 90) {
    current.css('color', '#6d5555');
  }
  if (characterCount > 90 && characterCount < 100) {
    current.css('color', '#793535');
  }
  if (characterCount > 100 && characterCount < 120) {
    current.css('color', '#841c1c');
  }
  if (characterCount > 120 && characterCount < 139) {
    current.css('color', '#8f0001');
  }
  
  if (characterCount >= 140) {
    maximum.css('color', '#8f0001');
    current.css('color', '#8f0001');
    theCount.css('font-weight','bold');
  } else {
    maximum.css('color','#666');
    theCount.css('font-weight','normal');
  }
  
      
});
</script>