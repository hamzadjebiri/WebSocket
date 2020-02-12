<template>
    
       <li class="nav-item dropdown">

                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell" style="color:red ;font-size:2em"></i>   <!--Notification icon  -->
                                
                                  <span >{{CountNotificaitons}}</span>
                                 
                              </a>

                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      
                                 <div v-for="InfoUsersSenders in UsersSenders">
                                    
                                    <a class="dropdown-item" :href="`${InfoUsersSenders.data.thead}`">{{InfoUsersSenders.data.user}}   a commenter sur votre publication  </a>
                                 
                                 </div>
            

                              </div>

     </li>
                           
</template>

<script>

export default {
    
    props:['userid','countnotificaitons','userssenders'] ,

    data(){

        return {

             CountNotificaitons  : this.countnotificaitons ,
             
             UsersSenders : this.userssenders,


         }
   },

   mounted(){

        Echo.private('App.User.' + this.userid)

               .notification((notification) => {

                   console.log(notification);
   
                         this.CountNotificaitons ++ ; 

                         // the notification get from auth()->user()->unreadNotifications And the notificaitions from
                         //laravel-echo is not same structure so i must make its same
                         //bcs i need to make one code when i want display notifications
                         // i can use controller and create here a methode to get notification from database
                         //if i do not want to get it from page welcome

                         this.UsersSenders.push( {data:{user:notification.user}} ) ;

           });

          // this.getNotification();
   },

   methods:{
   
   /* ====> i can use controller or i send directly from welcome to notification.vue our notifications 
  
       getNotification(){
        
           console.log('get notifications ! ') ;

           axios.get('/getNotifications')
           
           .then(response =>{

                 console.log(' comment success ! ') ;
         
                 console.log('comment:'+response.data.type) ;
                 
                 this.UsersSenders.push(response.data) ;

                 
           }).catch(error => {
               
               console.log(error) ;

           });

       }

       */

   }
}
</script>
