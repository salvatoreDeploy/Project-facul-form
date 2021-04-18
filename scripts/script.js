function validForm(){
    let tamanho_nome = document.forms["meuForm"].campo_nome.value.length;
    
    if(tamanho_nome < 5 || tamanho_nome > 64){
        alert("O campo 'Nome' deve ter entre 5 a 64 caracteres");
        return false;
    }

    let email = document.forms["meuForm"].campo_email.value;

    if(email.length < 5 || email.length > 128 || email.indexOf('@') == -1 || email.indexOf('.') == -1)
    {
        alert("O campo 'E-mail' deve ser prenchido corretamente.");
        return false;
    }

    let idade = document.forms["meuForm"].campo_idade.value;

    if(isNaN(idade) || idade < 5 || idade > 120)
    {
        alert("O campo 'Idade' deve ser prenchido corretamente.");
        return  false;
    }

    let campo_sexo = document.forms["meuForm"].campo_sexo;
    let sexo = false;

    for(i=0; i<campo_sexo.length; i++)
    {
        if(campo_sexo[i].checked == true)
        {
            sexo = campo_sexo[i].value;
            break;
        }
    }
    if(sexo == false){
        alert("O campo 'Sexo' deve ser preenchido.")
        return false;
    }

    let opacao_curso = document.forms["meuForm"].campo_curso.selectedIndex;

    if(opacao_curso == 0){
        alert("O campo 'Curso' deve ser preenchido");
        return false;
    }

    let conhecimentos = document.forms["meuForm"].elements['campo_conhecimento[]'];
    let conhecimentoMarcado = 0;

    for(i=0; i<conhecimentos.length; i++){
        if(conhecimentos[i].checked == true){
            conhecimentoMarcado++;
        }
    }

    if(conhecimentoMarcado < 2){
        alert("É necessario marcar 2 conhecimentos.");
        return false;
    }

    document.forms["meuForm"].submit();
}


