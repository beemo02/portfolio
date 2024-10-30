$(document).ready(function (){
    $('#categorydropdown').click(function(){
        let categoryId = $(this).val();

        $('#subCategorydropdown').html('<option value="">Select Subcategory</option>');

        if(categoryId){
            $.ajax({
                url: subCatUrl,
                type: 'GET',
                data: {category_id : categoryId},
                success: function(response){
                    if(response.success){
                        $.each(response.subcategories, function(key, subcategory){
                            $('#subCategorydropdown').append('<option value="'+ subcategory.id + '">' + subcategory.name + '</option>');
                        })
                    }
                },
                error: function () {
                    alert('Error retrieving subcategories');
                }
            })
        }
    })
})