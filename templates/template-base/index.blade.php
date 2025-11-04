<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $config_nome }}</title>
  <script src="https://cdn.tailwindcss.com/3.4.17"></script>
  <style>
    /* Estilos estáticos permanecem */
    .btn-primaria { background-color: var(--cor-primaria); color: white; }
    .btn-primaria:hover { background-color: color-mix(in srgb, var(--cor-primaria) 80%, black); }
    .btn-secundaria { background-color: var(--cor-secundaria); color: white; }
    .btn-secundaria:hover { background-color: color-mix(in srgb, var(--cor-secundaria) 80%, black); }
    .modal { display: none; position: fixed; z-index: 50; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.5); }
    .modal-content { background-color: var(--cor-fundo); margin: 10% auto; padding: 20px; border-radius: 8px; max-width: 500px; }
    .close { float: right; font-size: 1.5rem; cursor: pointer; }
  </style>
</head>
<body style="--cor-primaria:{{ $config_cor_primaria }}; --cor-secundaria:{{ $config_cor_secundaria }}; --cor-fundo:{{ $config_cor_fundo }};">

  <header id="header" class="shadow p-4 flex items-center justify-between" style="background-color: var(--cor-fundo);">
    <div class="flex items-center gap-2">
      <img id="logo" src="{{ $config_logo }}" alt="Logo" class="h-10">
      <h1 id="nome-empresa" class="font-bold text-lg" style="color: var(--cor-primaria);">{{ $config_nome }}</h1>
    </div>
    <nav>
      <ul id="menu" class="flex gap-4">
        <li><a href='#home' class='hover:text-[var(--cor-primaria)]'>Home</a></li>
        <li><a href='#quem-somos' class='hover:text-[var(--cor-primaria)]'>Quem Somos</a></li>
        <li><a href='#produtos' class='hover:text-[var(--cor-primaria)]'>Produtos</a></li>
        <li><a href='#contato' class='hover:text-[var(--cor-primaria)]'>Contato</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home" class="p-8 text-center" style="background-color: var(--cor-fundo);">
      <img id="banner" src="{{ $home_banner }}" class="mx-auto mb-6 rounded-lg" alt="Banner">
      <h2 id="titulo-home" class="text-2xl font-bold mb-2" style="color: var(--cor-primaria);">{{ $home_titulo }}</h2>
      <p id="descricao-home" class="text-gray-700">{{ $home_descricao }}</p>
    </section>

    <section id="quem-somos" class="p-8" style="background-color: var(--cor-fundo);">
      <h2 id="titulo-quem" class="text-2xl font-bold mb-4 text-center" style="color: var(--cor-primaria);">{{ $quem_somos_titulo }}</h2>
      <p id="descricao-quem" class="text-center mb-8">{{ $quem_somos_descricao }}</p>
      
      <div id="equipe" class="grid md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <img src='{{ $equipe_1_foto }}' alt='{{ $equipe_1_nome }}' class='w-24 h-24 mx-auto rounded-full mb-3'>
          <h3 class='font-bold'>{{ $equipe_1_nome }}</h3>
          <p class='text-gray-600'>{{ $equipe_1_cargo }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <img src='{{ $equipe_2_foto }}' alt='{{ $equipe_2_nome }}' class='w-24 h-24 mx-auto rounded-full mb-3'>
          <h3 class='font-bold'>{{ $equipe_2_nome }}</h3>
          <p class='text-gray-600'>{{ $equipe_2_cargo }}</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <img src='{{ $equipe_3_foto }}' alt='{{ $equipe_3_nome }}' class='w-24 h-24 mx-auto rounded-full mb-3'>
          <h3 class='font-bold'>{{ $equipe_3_nome }}</h3>
          <p class='text-gray-600'>{{ $equipe_3_cargo }}</p>
        </div>
      </div>
    </section>

    <section id="produtos" class="p-8" style="background-color: var(--cor-fundo);">
      <h2 id="titulo-produtos" class="text-2xl font-bold mb-4 text-center" style="color: var(--cor-primaria);">{{ $produtos_titulo }}</h2>
      <p id="descricao-produtos" class="text-center mb-8">{{ $produtos_descricao }}</p>
      
      <div id="lista-produtos" class="grid md:grid-cols-3 gap-6">
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <img src='{{ $produto_1_imagem }}' alt='{{ $produto_1_nome }}' class='w-full h-40 object-cover mb-3 rounded'>
          <h3 class='font-bold mb-1'>{{ $produto_1_nome }}</h3>
          <p class='text-gray-600 mb-2'>{{ $produto_1_descricao }}</p>
          <p class='font-semibold mb-3' style='color: var(--cor-primaria)'>R$ {{ $produto_1_preco }}</p>
          <button class='btn-primaria px-4 py-2 rounded add-to-cart-btn'
                  data-nome="{{ $produto_1_nome }}"
                  data-preco="{{ $produto_1_preco }}">
            Adicionar ao Carrinho
          </button>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <img src='{{ $produto_2_imagem }}' alt='{{ $produto_2_nome }}' class='w-full h-40 object-cover mb-3 rounded'>
          <h3 class='font-bold mb-1'>{{ $produto_2_nome }}</h3>
          <p class='text-gray-600 mb-2'>{{ $produto_2_descricao }}</p>
          <p class='font-semibold mb-3' style='color: var(--cor-primaria)'>R$ {{ $produto_2_preco }}</p>
          <button class='btn-primaria px-4 py-2 rounded add-to-cart-btn'
                  data-nome="{{ $produto_2_nome }}"
                  data-preco="{{ $produto_2_preco }}">
            Adicionar ao Carrinho
          </button>
        </div>
        <div class="bg-white p-4 rounded-lg shadow text-center">
          <img src='{{ $produto_3_imagem }}' alt='{{ $produto_3_nome }}' class='w-full h-40 object-cover mb-3 rounded'>
          <h3 class='font-bold mb-1'>{{ $produto_3_nome }}</h3>
          <p class='text-gray-600 mb-2'>{{ $produto_3_descricao }}</p>
          <p class='font-semibold mb-3' style='color: var(--cor-primaria)'>R$ {{ $produto_3_preco }}</p>
          <button class='btn-primaria px-4 py-2 rounded add-to-cart-btn'
                  data-nome="{{ $produto_3_nome }}"
                  data-preco="{{ $produto_3_preco }}">
            Adicionar ao Carrinho
          </button>
        </div>
      </div>
    </section>

    <section id="carrinho" class="p-8 hidden" style="background-color: var(--cor-fundo);">
      <h2 class="text-2xl font-bold mb-4 text-center" style="color: var(--cor-primaria);">Carrinho de Compras</h2>
      <div id="itens-carrinho" class="max-w-2xl mx-auto bg-white p-4 rounded shadow"></div>
      <div class="text-center mt-4">
        <button id="finalizar-compra" class="btn-primaria px-6 py-2 rounded">Finalizar Compra</button>
      </div>
    </section>

    <section id="contato" class="p-8 text-center" style="background-color: var(--cor-fundo);">
      <h2 id="titulo-contato" class="text-2xl font-bold mb-4" style="color: var(--cor-primaria);">{{ $contato_titulo }}</h2>
      <p id="descricao-contato" class="mb-6">{{ $contato_descricao }}</p>
      <form class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
        <input type="text" placeholder="Seu nome" class="w-full border mb-3 p-2 rounded">
        <input type="email" placeholder="Seu e-mail" class="w-full border mb-3 p-2 rounded">
        <textarea placeholder="Mensagem" class="w-full border mb-3 p-2 rounded"></textarea>
        <button type="submit" class="btn-primaria px-4 py-2 rounded">Enviar</button>
      </form>
    </section>

  <button id="abrir-carrinho" class="btn-primaria px-4 py-2 rounded fixed top-4 right-4">Carrinho</button>

  <div id="modal-carrinho" class="modal">
    <div class="modal-content">
      <span class="close" id="fechar-carrinho">&times;</span>
      <h2 class="text-xl font-bold mb-4" style="color: var(--cor-primaria);">Carrinho de Compras</h2>
      <div id="itens-carrinho" class="mb-4"></div>
      <div class="text-center">
        <button id="finalizar-compra" class="btn-primaria px-6 py-2 rounded">Finalizar Compra</button>
      </div>
    </div>
  </div>
  </main>

  <footer class="text-white text-center p-4 mt-8" id="footer" style="background-color: var(--cor-secundaria);">
    <p>&copy; @php echo date('Y'); @endphp <span id="footer-nome">{{ $config_nome }}</span>. Todos os direitos reservados.</p>
  </footer>

  <script>
    // --- O JS de 'fetch()' foi REMOVIDO ---

    // --- A Lógica do Carrinho (interativa) PERMANECE ---

    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    function atualizarCarrinho(){
      const itens = document.getElementById('itens-carrinho');
      itens.innerHTML = '';
      if(carrinho.length === 0){
        itens.innerHTML = '<p class="text-center text-gray-600">Seu carrinho está vazio.</p>';
      } else {
        carrinho.forEach((i, idx)=>{
          const div = document.createElement('div');
          div.className = 'flex justify-between items-center border-b py-2';
          div.innerHTML = `<span>${i.nome} - R$ ${i.preco}</span><button class='text-red-600' onclick='removerItem(${idx})'>Remover</button>`;
          itens.appendChild(div);
        });
        const total = carrinho.reduce((s,v)=>s + parseFloat(v.preco),0).toFixed(2);
        const totalDiv = document.createElement('div');
        totalDiv.className = 'text-right font-bold mt-2';
        totalDiv.textContent = `Total: R$ ${total}`;
        itens.appendChild(totalDiv);
      }
      localStorage.setItem('carrinho', JSON.stringify(carrinho));
    }

    function adicionarAoCarrinho(produto){
      carrinho.push(produto);
      atualizarCarrinho();
      abrirCarrinho();
    }

    function removerItem(index){
      carrinho.splice(index,1);
      atualizarCarrinho();
    }

    // ADAPTADO: Adiciona 'event listeners' aos botões que o Blade criou
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
      button.addEventListener('click', () => {
        const produto = {
          nome: button.dataset.nome,
          preco: button.dataset.preco
        };
        adicionarAoCarrinho(produto);
      });
    });

    document.getElementById('finalizar-compra').addEventListener('click', ()=>{
      if(carrinho.length === 0){ alert('Carrinho vazio!'); return; }
      alert('Compra finalizada com sucesso! Total: R$ '+carrinho.reduce((s,v)=>s+parseFloat(v.preco),0).toFixed(2));
      carrinho=[];
      atualizarCarrinho();
      fecharCarrinho();
    });

    // Lógica do Modal (permanece igual)
    const modal = document.getElementById('modal-carrinho');
    const btnAbrir = document.getElementById('abrir-carrinho');
    const btnFechar = document.getElementById('fechar-carrinho');

    function abrirCarrinho(){
      modal.style.display='block';
      atualizarCarrinho();
    }
    function fecharCarrinho(){ modal.style.display='none'; }

    btnAbrir.onclick = abrirCarrinho;
    btnFechar.onclick = fecharCarrinho;
    window.onclick = function(event){ if(event.target == modal){ fecharCarrinho(); } }

    // Atualiza o carrinho na inicialização
    atualizarCarrinho();
  </script>

</body>
</html>