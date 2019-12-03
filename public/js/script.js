

 let receiver_id = '';
 let my_id = "{{ Auth::id() }}";
 // let users_wrapper = $('#users-wrapper');

 $(document).ready(function() {
     // ajax setup form csrf token
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     // Enable pusher logging - don't include this in production
     Pusher.logToConsole = true;

     let pusher = new Pusher('bb5bb879b82a445b7b26', {
         cluster: 'eu',
         forceTLS: true
     });

     let channel = pusher.subscribe('my-channel');
     channel.bind('my-event', function(data) {
         //сообщение при получение у юзера
         // alert(JSON.stringify(data));
         if(my_id == data.from){
             $('#' + data.to).click();
         } else if(my_id.data.to){
            // alert('Sender!!!');
             if(receiver_id == data.from){
                 // if receiver is selected, reload the selected user ...
                 $('#' + data.from).click();
             } else{
                // if recevier is not selected, add notification for that user
                 let pending = ($('#' + data.from).find('.pending').html());

                 if(pending){
                     $('#'+data.from).find('.pending').html(pending + 1);
                 }else{
                     $('#'+data.from).append('<span class="pending">i</span>');
                 }
             }
         }
     });
     //End pusher ------------------------------------------------------


     // Add bg to users-wrapper
     //При нажатие на юзера добавление bg active и взятие его id
     $('.user').click(function () {
         $('.user').removeClass('active');
         $(this).addClass('active');

         // $('#users-wrapper').addClass('display-none');
         // $('#arrow').addClass('display-block');


         $(this).find('.pending').remove();
         //Grab attr id
         receiver_id = $(this).attr('id');
         //Вывод переписки с юзером
         $.ajax({
            type: "get",
            url: "message/" + receiver_id,// need to create this route
            data: "",
            cache: false,
            success: (data)=>{
                $('#messages').html(data);
                scrollToBottomFunc();
                // alert(data);
                // alert(receiver_id);
            }
         });
     });


     $(document).on('keyup', '.input-text input', function(e){
        // Grab message
         let message = $(this).val();
        // alert(receiver_id);

         // check if Enter key is pressed message is not null also receiver is selected
         //Если enter нажат и ,mess не пустое и id юзера которому отправляем письмо не пустое
         if(e.keyCode == 13 && message !='' && receiver_id != ''){
             $(this).val('');// После нажатия поле очищаеться
             //Отправляемые данные Например:   receiver_id=5&message=Сообщение
             let datastr = "receiver_id=" + receiver_id + "&message=" + message;
             //Ajax'ом отправляем методом пост на роут message который вызывает метод sendMessage
             $.ajax({
                type: "post",
                url: "message",// need to create this route
                data: datastr,
                cache: false,
                success: function (data) {
                },
                error: function (jqXHR, status, err) {

                },
                complete: function () {
                    scrollToBottomFunc();
                } 
             });
         }
     })
 });

 //Scroll down message wrapper function
 function scrollToBottomFunc(){
     $('.message-wrapper').animate({
         scrollTop: $('.message-wrapper').get(0).scrollHeight
     }, 50);
 }

 /* Set the width of the sidebar to 250px (show it) */
 function openNav() {
     document.getElementById("mySidepanel").style.width = "250px";
 }

 /* Set the width of the sidebar to 0 (hide it) */
 function closeNav() {
     document.getElementById("mySidepanel").style.width = "0";
 }

 // document.getElementById("arrow").addEventListener('click',function () {
 //     alert('ok');
 // });

 $(".email").click(function(){
     // $("#message-wrapper").hide();
     alert("ok");
 });
 // $('#arrow').click(showUsers);
 //
 // function showUsers(){
 //     document.getElementById("user-wrapper").style.display = "block";
 // }
 // $('#arrow').click(function () {
     // $('#users-wrapper').addClass('display-block');
     // alert('Ok');
     // document.getElementById("array").style.display = "block";
 // });