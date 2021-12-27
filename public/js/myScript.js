$(document).ready( function () {
   table = $('#tb_barang,#tb_suplier,#tb_jenis,#tb_customer').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            text: 'Tambah',
            action: function ( e, dt, node, config ) {
                $('#modal_store').modal('show');
            }
        },
        {
            text: 'Ubah',
            action: function ( e, dt, node, config ) {
                $('#modal_update').modal('show');
            }
        },
        {
            text: 'Hapus',
            action: function ( e, dt, node, config ) {
              $('#modal_delete').modal('show');
            }
        },
    ]
   });

    $('#tb_barang').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');    
            $('#id,#id_delete').attr('value', table.row( this ).data()[0]);    
            $('#nama').attr('value', table.row( this ).data()[2]);    
            $('#harga').attr('value', table.row( this ).data()[3]);  
            $('#stock').attr('value', table.row( this ).data()[4]);  
            $('#deskripsi').attr('value', table.row( this ).data()[6]);  
        }
    });

    $('#tb_suplier').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');    
            $('#id,#id_delete').attr('value', table.row( this ).data()[0]);    
            $('#nama').attr('value', table.row( this ).data()[1]);    
            $('#email').attr('value', table.row( this ).data()[2]);  
            $('#telp').attr('value', table.row( this ).data()[3]);  
            $('#alamat').attr('value', table.row( this ).data()[4]);  
        }
    });

    $('#tb_jenis').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');    
            $('#id,#id_delete').attr('value', table.row( this ).data()[0]);    
            $('#kode').attr('value', table.row( this ).data()[1]);    
            $('#jenis').attr('value', table.row( this ).data()[2]);   
        }
    });

    $('#tb_customer').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');    
            $('#id,#id_delete').attr('value', table.row( this ).data()[0]);    
            $('#nama').attr('value', table.row( this ).data()[1]);    
            $('#alamat').attr('value', table.row( this ).data()[2]);  
            $('#telp').attr('value', table.row( this ).data()[3]);  
            $('#email').attr('value', table.row( this ).data()[4]);  
        }
    });
});