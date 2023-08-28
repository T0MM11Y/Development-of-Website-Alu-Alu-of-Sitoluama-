  <!-- Modal Login -->
  <div id="loginModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="width: 80%;">
              <div class="modal-body">
                  <p class="form-title custom-title">Login</p>
                  <form class="form-horizontal mt-3" action="{{ route('admin.login') }}" method="POST">
                      @csrf
                      <div class="form-group mb-3 row">
                          <div class="error-message" style="color: red; display: none;"></div>

                          <div class="col-12">
                              <input class="form-control" type="text" name="username" placeholder="Username"
                                  required>
                          </div>
                      </div>
                      <div class="form-group mb-3 row">
                          <div class="col-12">
                              <input class="form-control" type="password" name="password" placeholder="Password"
                                  required>
                          </div>
                      </div>
                      <div class="form-group mb-3 text-center row mt-3 pt-1">
                          <div class="col-12">
                              <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                          </div>
                      </div>
                      <div class="form-group mb-0 row mt-2">
                          <div class="col-sm-8 mt-3">
                              <a href="#" id="createAccountLink" class="text-muted"><i
                                      class="mdi mdi-account-circle"></i> Create an account</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
          // Event listener saat form login di-submit
          $('form[action="{{ route('admin.login') }}"]').submit(function(e) {
              e.preventDefault(); // Mencegah form melakukan submit secara default

              var form = $(this); // Mengambil referensi form yang sedang di-submit
              var formData = form.serialize(); // Mengambil data form dalam bentuk serialized

              // Mengirim data form ke server untuk validasi
              $.ajax({
                  url: form.attr('action'),
                  method: 'POST',
                  data: formData,
                  dataType: 'json',
                  beforeSend: function() {
                      // Menampilkan pesan atau indikator loading sebelum request dikirim
                      // Misalnya, menampilkan spinner atau pesan "Loading..."
                  },
                  success: function(response) {
                      // Tangani respons dari server setelah validasi
                      if (response.success) {
                          // Jika validasi sukses, redirect ke halaman yang dituju
                          window.location.href = response.redirect;
                      } else {
                          // Jika validasi gagal, tampilkan pesan error
                          var errorContainer = $('.error-message');
                          errorContainer.text(response.message).show();

                          // Sembunyikan pesan error setelah 2 detik
                          setTimeout(function() {
                              errorContainer.hide();
                          }, 2000);
                      }

                  },
                  error: function(xhr, status, error) {
                      // Tangani error jika request gagal
                      console.error(error);
                  },
                  complete: function() {
                      // Aksi yang dijalankan setelah request selesai, terlepas dari sukses atau gagal
                      // Misalnya, menyembunyikan pesan loading
                  }
              });
          });
      });
  </script>


  <!-- Modal Register -->
  <div id="registerModal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="width: 80%;">
              <div class="modal-body">
                  <p class="form-title custom-title">Register</p>
                  <form id="registerForm" class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                      @csrf


                      <!-- Username -->
                      <div class="form-group mb-3 row">
                          <div class="col-12">
                              <input id="username" class="form-control" type="text" name="username"
                                  placeholder="Username" :value="old('username')" required autofocus
                                  autocomplete="username" />
                              <div class="error-message error-username" style="color: red"></div>

                          </div>
                      </div>
                      <!-- Password -->
                      <div class="form-group mb-3 row">
                          <div class="col-12">
                              <input id="password" class="form-control" type="password" name="password"
                                  placeholder="Password" required autocomplete="new-password" />

                          </div>
                      </div>
                      <!-- Confirm Password -->
                      <div class="form-group mb-3 row">
                          <div class="col-12">
                              <input id="password_confirmation" class="form-control" type="password"
                                  placeholder="Confirm Password" name="password_confirmation" required
                                  autocomplete="new-password" />
                              <div class="error-message error-password" style="color: red"></div>

                          </div>
                      </div>
                      <div class="form-group mb-3 text-center row mt-3 pt-1">
                          <div class="col-12">
                              <button class="btn btn-info w-100 waves-effect waves-light"
                                  type="submit">Register</button>
                          </div>
                      </div>
                      <div class="form-group mb-0 row mt-2">
                          <div class="col-sm-8 mt-3">
                              <a href="#" id="alreadyHaveAccountLink" class="text-muted"><i
                                      class="mdi mdi-account-circle"></i> Already have an account?</a>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <script>
      $(document).ready(function() {
          // Submit form menggunakan AJAX
          $('#registerForm').on('submit', function(event) {
              event.preventDefault(); // Mencegah pengiriman formulir secara tradisional

              var form = $(this); // Mengambil referensi form yang sedang disubmit
              var url = form.attr('action'); // Mengambil URL endpoint untuk mengirim data form
              var method = form.attr('method'); // Mengambil metode HTTP yang digunakan (POST)
              var formData = new FormData(form[0]); // Membuat objek FormData untuk mengambil data form


              $.ajax({
                  url: url,
                  method: method,
                  data: formData,
                  dataType: 'json',
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(response) {
                      if (response.success) {
                          // Redirect ke halaman tujuan jika validasi sukses
                          window.location.href = response.redirect;
                      } else {
                          displayErrors(response.errors);
                      }
                  },
                  error: function(xhr, textStatus, error) {
                      console.log(xhr.responseText); // Tampilkan pesan error pada konsol
                  }
              });
          });

          // Fungsi untuk menampilkan pesan error
          function displayErrors(errors) {
              var form = $('#registerForm');
              var errorContainer = form.find('.error-message');
              errorContainer.empty();

              $.each(errors, function(field, messages) {
                  var errorMessages = '';

                  $.each(messages, function(index, message) {
                      errorMessages += '<div>' + message + '</div>';
                  });

                  var fieldContainer = form.find('.error-' + field);
                  fieldContainer.html(errorMessages);
                  fieldContainer.show(); // Tampilkan pesan error

                  // Sembunyikan pesan error setelah 2 detik
                  setTimeout(function() {
                      fieldContainer.hide();
                  }, 2000);
              });
          }

      });
  </script>


  <script>
      // Ambil elemen modal login dan register
      var loginModal = document.getElementById('loginModal');
      var registerModal = document.getElementById('registerModal');

      // Tambahkan event listener pada tombol "Create an account"
      document.getElementById('createAccountLink').addEventListener('click', function(e) {
          e.preventDefault(); // Menghentikan tindakan default hyperlink

          // Tutup modal login
          $('#loginModal').modal('hide');

          // Buka modal register
          $('#registerModal').modal('show');
      });

      // Tambahkan event listener pada tombol "Already have an account?"
      document.getElementById('alreadyHaveAccountLink').addEventListener('click', function(e) {
          e.preventDefault(); // Menghentikan tindakan default hyperlink

          // Tutup modal register
          $('#registerModal').modal('hide');

          // Buka modal login
          $('#loginModal').modal('show');
      });
  </script>
