(function() {
  "use strict";

ORGANICSTORE.home.sendMessage = function() {
  let app = new Vue({
    el: '#sendMessage',
    data: {
      loading: false,
      name: '',
      email: '',
      textArea: '',
      errors: {},
      loading: false
    },
    methods: {
      submit: function() {
        this.loading = true;
        let token = $(".section-book").data('token');
        let postData = $.param({name: app.name, email: app.email, textArea: app.textArea, token: token});
        axios.post('/send-message', postData).then(function(res) {

          app.name = ''; app.email = ''; app.textArea = '';
          if (res.data.errors) {
            app.loading = false;
            app.errors = res.data.errors;
            let msg = `${app.errors.name[0]} and  ${app.errors.email[0]}`;
            Swal.fire({

              title: '<strong>ERROR</strong>',
              width: 600,
              padding: '3em',
              fontSize: '3em',
              text: msg,
              icon: 'error',
            });
          }else {
            app.loading = false;
            let msg = res.data.success;
            Swal.fire({
              title: '<strong>MESSAGE RECEIVED 👍</strong>',
              width: 600,
              padding: '3em',
              fontSize: '3em',
              text: msg,
              icon: 'success',
            });
          }

        })
      }
    },
    created: function() {

    },
    mounted: function() {

    }

  });
}


})()
