document
.getElementById('registerForm')
.addEventListener('submit', async function(e){

    e.preventDefault();

    const form = e.target;

    const formData = new FormData(form);

    try{

        const response = await fetch('/resident/register', {

            method: 'POST',

            headers: {

                'X-CSRF-TOKEN':
                document.querySelector('meta[name="csrf-token"]').content,

                'Accept': 'application/json'

            },

            body: formData

        });

        const data = await response.json();

        if(data.success){

            alert(data.message);

            form.reset();

        }else{

            alert('Erro ao cadastrar.');

        }

    }catch(error){

        console.error(error);

        alert('Erro ao processar cadastro.');

    }

});