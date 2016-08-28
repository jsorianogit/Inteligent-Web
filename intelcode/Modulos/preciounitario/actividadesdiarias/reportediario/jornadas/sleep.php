<script>
 function ZZzzzZZzzzzzzZZZz(naptime){
      naptime = naptime * 1000;
      var sleeping = true;
      var now = new Date();
      var alarm;
      var startingMSeconds = now.getTime();
      alert("starting nap at timestamp: " + startingMSeconds + "\nWill sleep for: " + naptime + " ms");
      while(sleeping){
         alarm = new Date();
         alarmMSeconds = alarm.getTime();
         if(alarmMSeconds - startingMSeconds > naptime){ sleeping = false; }
      }      
      alert("Wakeup!");
   }
   ZZzzzZZzzzzzzZZZz(1);
</script>