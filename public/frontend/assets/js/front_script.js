$(document).ready(function(){

   // subscribe us
   $('#emailForm').on('submit',function(e){
      e.preventDefault();
     var email = $('#email').val();
     if(email == ''){
       alert('Please Enter Valid Email');
     }else{
        $.ajax({
         url:'/subscribe-us',
         type:'post',
         data:{email:email},
         success:function(data){
            if(data.status == 'success'){
               alert('Subscription Successfully Added');
               $('#emailForm')['0'].reset();
            }
 
         },error:function(){
            alert('Error');
         }
        });
     }
    
   })


   // contact us
   $('#contactForm').on('submit',function(e){
      e.preventDefault();
     var name = $('#name').val();
     var email = $('#email').val();
     var subject = $('#subject').val();
     var message = $('#message').val();
     if(name == '' || email == '' || subject == '' || message == ''){
       alert('Please Enter Value All Fields');
     }else{
        $.ajax({
         url:'/contact-us',
         type:'post',
         data:{name:name,email:email,subject:subject,message:message},
         success:function(data){
            if(data.status == 'success'){
               alert('Your Message Successfully Sent');
               $('#contactForm')['0'].reset();
            }
 
         },error:function(){
            alert('Error');
         }
        });
     }
    
   })
   
});

