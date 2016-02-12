            // ambil data
            function getData()
            {
                url = document.getElementById('display-data').getAttribute("data-link")+'/daftar';
               
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        'showrecord': 1
                    },
                    success:function(s)
                    {
                        $('#display-data').html(s);
                    }
                })
            }

            getData();

             // simpan data
            function saveData(url, data) {                

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success:function(msg)
                    {
                        if(msg == 0) {
                            getData();
                            $('.box-alert').append('<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
                             reset();
                        } else {
                            $('.box-alert').append('<div class="alert alert-danger" role="alert">Tambah data gagal</div>');
                        }
                        /*$('.collapse').collapse("hide");*/
                        $('.alert').fadeOut(10000);
                    }
                })

            }

            // before edit data
            $('#display-data').on('click', '.btn-edit', function() {
                var id = $(this).attr("data-id");
                 url = document.getElementById('display-data').getAttribute("data-link")+'/'+id+'/edit';

                 $.ajax({
                    url: url,
                    type: 'GET',
                    data: '',
                    success:function(msg) {
                        var data = JSON.parse(msg);
                        setDataEdit(data);
                    }
                 });
            });

            // update data
            function updateData(url, data) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success:function(msg)
                    {
                        if(msg == 0) {
                            getData();
                            $('.box-alert').append('<div class="alert alert-success" role="alert">Data berhasil diedit</div>');
                             reset();
                        } else {
                            $('.box-alert').append('<div class="alert alert-danger" role="alert">Edit data gagal</div>');
                        }
                        /*$('.collapse').collapse("hide");*/
                        $('.alert').fadeOut(10000);
                    }
                })
            }

            // hapus data
            $('#display-data').on('click', '.btn-delete', function() {
                var id = $(this).attr("data-id");
                url = document.getElementById('display-data').getAttribute("data-link")+'/'+id;

                //console.log(url);

                var token = $(this).data('token');

                $.ajax({
                    url: url,
                    type: 'post',
                    data: {_method: 'delete', _token :token},
                    success:function(msg) {
                       if(msg == 0) {
                            getData();
                            $('.box-alert').append('<div class="alert alert-success" role="alert">Data berhasil dihapus</div>');
                        } else {
                            $('.box-alert').append('<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
                        }
                        $('.collapse').collapse("hide");
                        $('.alert').fadeOut(10000);
                    }
                })
            });
