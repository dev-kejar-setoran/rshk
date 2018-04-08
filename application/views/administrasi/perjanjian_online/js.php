<!-- js index.php -->
<script type="text/javascript">
    openConfirmationModal = function(){
      $('.ui.confirmation.modal').modal({
        observeChanges: true,
        closable: false,
        detachable: false,
        autofocus: false
      })
      .modal('show')
      .modal("refresh");
    }
    
    $(document).ready(function () {
      $('.pusher').removeClass('shown')
      $('.toggler').hide()

      $('.menu .item').tab()
      // $('.date').calendar({
      //   type: 'date',
      //   formatter: {
      //     date: function (date, settings) {
      //       if (!date) return '';
      //       var day = date.getDate() + '';
      //       if (day.length < 2) {
      //         day = '0' + day;
      //       }
      //       var month = (date.getMonth() + 1) + '';
      //       if (month.length < 2) {
      //         month = '0' + month;
      //       }
      //       var year = date.getFullYear();
      //       return day + '/' + month + '/' + year;
      //     },
      //   }
      // })
      // $('.time').calendar({
      //   type: 'time',
      //   ampm: false
      // })

      $('.first.button').on('click', function() {
        $.tab('change tab', 'first');
        $('.step[data-tab="first"]').removeClass('completed').addClass('active')
        $('.step[data-tab="second"]').addClass('disabled').removeClass('active')
      });
      $('.second.button').on('click', function() {
        $.tab('change tab', 'second');
        if($('.step[data-tab="first"]').hasClass('active')){
          $('.step[data-tab="first"]').addClass('completed').removeClass('active')
          $('.step[data-tab="second"]').addClass('active').removeClass('disabled')
        }else{
          $('.step[data-tab="third"]').addClass('disabled').removeClass('active')
          $('.step[data-tab="second"]').addClass('active').removeClass('completed disabled')
        }
      });
      $('.third.button').on('click', function() {
        $.tab('change tab', 'third');
        $('.step[data-tab="second"]').addClass('completed').removeClass('active')
        $('.step[data-tab="third"]').addClass('active').removeClass('disabled')
      });
    });

</script>
<!-- js list.php -->
<script type="text/javascript">
    $(document).ready(function () {
      $('.start.time').calendar({
        type: 'time',
        ampm: false,
        onChange: function(){
          $('.end.time').calendar({
            type: 'time',
            ampm: false,
            startCalendar: $('.start.time')
          });
        }
      });
      $('.end.time').calendar({
        type: 'time',
        ampm: false,
        onChange: function(){
          $('.start.time').calendar({
            type: 'time',
            ampm: false,
            endCalendar: $('.end.time')
          });
        }
      });
    });
  </script>
