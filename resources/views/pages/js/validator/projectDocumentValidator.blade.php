<script>
        function validateProjectDocument() {
            console.log("It got to the validator")
            //let dropZone = $('#document-dropzone').innerHTML;
            let documentType = $('#version').val();
            let documentName = $('#document-name').val();


            // Defining error variables with a default value
            var documentVersionErr = documentNameErr = true;


            if (documentType  == "") {
                printError("documentVersionErr", "Please input a version");
            } else {
                printError("documentVersionErr", "");
                documentVersionErr = false;
            }

            // if (dropZone== "") {
            //     printError("dropZoneErr", "Please select the document type");
            // } else {
            //     printError("dropZoneErr", "");
            //     dropZoneErr = false;
            // }


            var allDocuments;
            $.ajax({
                type: "GET",
                url: "{{ url('/api/v1/documents') }}",
                async: false,
                success: function(data) {
                    allDocuments = data;

                },

                error: function(data) {

                }

            })

            if (documentName == "") {
                printError("documentNameErr", "Please input the document name");
            } else if (documentName) {
                documentName = documentName.toUpperCase();

                if(allDocuments.data.length==0){
                    printError("documentNameErr", "");
                        documentNameErr = false;
                }
                else{
                    for (let i = 0; i < allDocuments.data.length; i++) {
                        if (allDocuments.data[i].name.toUpperCase() === documentName) {
                            printError("documentNameErr", "Document name already exists");
                            documentNameErr = true;
                            break;
                        } else {
                            printError("documentNameErr", "");
                            documentNameErr = false;
                        }
                }
            }

            }


            // Prevent the form from being submitted if there are any errors

            if ((documentVersionErr || documentNameErr) == true) {
                console.log("The alternate point for create function call")
                return false;
            } else {
                console.log("The point of create function call")
                addProjectDocFunction();
            }
        };
</script>
