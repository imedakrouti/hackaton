$(function(e) {
	//file export datatable
	var table = $('#example').DataTable({
		lengthChange: false,
		buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_ ',
		}
	});
	table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq(0)' );

	$('#example1').DataTable({
		language: {
			searchPlaceholder: 'Rechercher...',
			sSearch: '',
            url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/French.json",
			lengthMenu: '_MENU_',
		}
        /* language: {
            
			searchPlaceholder: 'Rechercher...',
			sSearch: '',
			lengthMenu: '_MENU_', 
            url: "https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json"
		}, */

	});
	$('#example2').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});
	var table = $('#example-delete').DataTable({
		responsive: true,
		language: {
/* 			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_', */
            // url: '//cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'

		}
	});
    $('#example-delete tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );

    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

	//Details display datatable
	$('#example-1').DataTable( {
		responsive: true,
		 language: {
            /*
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_', */
            url: "https://cdn.datatables.net/plug-ins/1.10.16/i18n/French.json"
		},
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table border mb-0'
				} )
			}
		}
	} );
});
