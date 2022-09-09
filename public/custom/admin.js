(function($){
    $(document).ready(function(){

        // delete btn alert 
        $('.delete-form').submit(function(e){
            

            let conf = confirm('Are you sure ?');

            if(conf) {
                return true;
            } else {
                e.preventDefault();
            }


        });


        // our data tables
        $('.data-table-haq').DataTable();


        // slider photo management 
        $('#slider-photo').change(function(e){

            const photo_url = URL.createObjectURL(e.target.files[0]);
            $('#slider-photo-preview').attr('src', photo_url);
            

        });

        // add-new-slider-button 
        let btn_no = 1;
        $('#add-new-slider-button').click(function(e){
            e.preventDefault();

            $('.slider-btn-opt').append(`

                <div class="btn-opt-area">
                    <span>Button #${ btn_no }</span>
                    <span class="badge badge-danger remove-btn" style="margin-left:300px;cursor:pointer;">remove</span>
                    <input class="form-control" name="btn_title[]" type="text" placeholder="Button Title">
                    <input class="form-control" name="btn_link[]" type="text" placeholder="Button Link">                    
                    <select class="form-control" name="btn_type[]">
                        <option value="btn-light-out"> default </option>
                        <option value="btn-color btn-full"> Red </option>
                    </select>
                    <hr />
                    
                </div>

            `);
            btn_no++;
        });


        // remove btn 
        $(document).on('click', '.remove-btn', function(){

            $(this).closest('.btn-opt-area').remove();

        });

        // icon select 
        $('button.show-icon').click(function(e){
            e.preventDefault();

            $('#select-icon').modal('show');
            
        });

        // select iocn 
        $('.select-icon-haq .preview-icon code').click(function(){

            let icon_name = $(this).html();
            $('.select-haq-icon-input').val(icon_name);
            $('#select-icon').modal('hide');
            

        });

        // port folio galllery 
        $('#portfolio-gallery').change(function(e){
            
          const files = e.target.files;
            
          let gallery_ui = '';

          for( let i = 0; i < files.length ; i++ ) {
            const obj_url = URL.createObjectURL(files[i]);
            gallery_ui += `<img src="${ obj_url }">`;
          } 
            
          $('.port-gall').html(gallery_ui);


        });  

        // CK Editor 
        CKEDITOR.replace('portfolio-desc');


    });
})(jQuery)