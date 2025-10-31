# Template Institucional HTML

Template HTML responsivo e moderno para site institucional com 4 páginas: Home, Sobre, Serviços e Contato.

## 📋 Estrutura do Projeto

```
template-institucional/
├── index.html          # Página principal
├── sobre.html          # Página sobre a empresa
├── servicos.html       # Página de serviços
├── contato.html        # Página de contato
├── config.json         # Configurações e conteúdo do site
├── assets/
│   ├── css/
│   │   └── style.css   # Estilos principais
│   ├── js/
│   │   └── script.js   # JavaScript principal
│   └── img/            # Pasta para imagens
└── README.md           # Este arquivo
```

## 🚀 Características

- ✅ **Responsivo**: Funciona perfeitamente em desktop, tablet e mobile
- ✅ **Moderno**: Design clean e profissional
- ✅ **Configurável**: Arquivo JSON para fácil customização
- ✅ **SEO Friendly**: Meta tags otimizadas
- ✅ **Validação de Formulário**: JavaScript para validação de contato
- ✅ **Menu Mobile**: Menu hambúrguer para dispositivos móveis
- ✅ **Animações**: Efeitos suaves ao scroll

## 🎨 Tecnologias Utilizadas

- HTML5
- CSS3 (CSS Grid, Flexbox, Custom Properties)
- JavaScript ES6+
- Font Awesome (opcional para ícones)

## ⚙️ Como Usar

### 1. Personalização do Conteúdo

Edite o arquivo `config.json` para alterar:
- Informações da empresa
- Dados de contato
- Conteúdo das páginas
- Links de redes sociais
- Serviços oferecidos

### 2. Customização de Cores

No arquivo `assets/css/style.css`, altere as variáveis CSS no início do arquivo:

```css
:root {
    --primary-color: #2563eb;      /* Cor principal */
    --secondary-color: #1e40af;    /* Cor secundária */
    --accent-color: #3b82f6;       /* Cor de destaque */
    /* ... outras cores ... */
}
```

### 3. Adicionar Imagens

Coloque suas imagens na pasta `assets/img/` e atualize as referências no HTML.

### 4. Integração com Laravel/Livewire

Para integrar com Laravel:

#### Opção 1: Blade Templates

Converta os arquivos HTML para Blade:

```php
// resources/views/home.blade.php
@extends('layouts.app')

@section('content')
    <!-- Conteúdo da página -->
@endsection
```

#### Opção 2: Componentes Livewire

Crie componentes Livewire para seções interativas:

```php
// app/Http/Livewire/ContactForm.php
<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required|min:10',
    ];

    public function submit()
    {
        $this->validate();
        
        // Processar o formulário
        // Mail::to('contato@empresa.com.br')->send(new ContactMail($this->all()));
        
        session()->flash('success', 'Mensagem enviada com sucesso!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
```

#### Opção 3: Filament Admin Panel

Use Filament para gerenciar o conteúdo:

```php
// app/Filament/Resources/PageResource.php
<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;

class PageResource extends Resource
{
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\RichEditor::make('content'),
                Forms\Components\Toggle::make('is_active'),
            ]);
    }
}
```

## 📱 Menu Mobile

O menu mobile é ativado automaticamente em telas menores que 768px. O JavaScript gerencia a abertura/fechamento do menu.

## 📧 Formulário de Contato

### Configuração do Backend

Para processar o formulário, você pode:

1. **PHP Puro**:
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    
    // Enviar email
    mail('contato@empresa.com.br', $subject, $message);
}
?>
```

2. **Laravel Controller**:
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:10',
        ]);

        Mail::to('contato@empresa.com.br')->send(new ContactMail($validated));

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }
}
```

## 🗺️ Google Maps

Para adicionar o mapa do Google Maps na página de contato:

1. Obtenha uma API Key no [Google Cloud Console](https://console.cloud.google.com/)
2. Substitua a div placeholder por:

```html
<iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!..." 
    width="100%" 
    height="400" 
    style="border:0; border-radius: 0.5rem;" 
    allowfullscreen="" 
    loading="lazy">
</iframe>
```

## 🎨 Personalizações Comuns

### Alterar Logo

Substitua o texto do logo por uma imagem:

```html
<a href="index.html" class="logo">
    <img src="assets/img/logo.png" alt="Nome da Empresa" style="height: 40px;">
</a>
```

### Adicionar Novo Serviço

Edite o arquivo `config.json` na seção `services.items`:

```json
{
    "title": "Novo Serviço",
    "description": "Descrição do novo serviço",
    "icon": "🎯"
}
```

### Mudar Fonte

Adicione no `<head>` do HTML:

```html
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
```

E no CSS:

```css
body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}
```

## 📊 Analytics

Para adicionar Google Analytics:

```html
<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'GA_MEASUREMENT_ID');
</script>
```

## 🔒 Segurança

- Sempre valide e sanitize dados do formulário no backend
- Use HTTPS em produção
- Implemente proteção CSRF no Laravel
- Configure headers de segurança

## 📱 Redes Sociais

Atualize os links das redes sociais no arquivo HTML ou `config.json`:

```json
"social": {
    "facebook": "https://facebook.com/suaempresa",
    "instagram": "https://instagram.com/suaempresa",
    "linkedin": "https://linkedin.com/company/suaempresa",
    "youtube": "https://youtube.com/suaempresa"
}
```

## 🐛 Problemas Comuns

### Menu não abre no mobile
- Verifique se o JavaScript está carregando corretamente
- Certifique-se de que não há erros no console

### Formulário não envia
- Verifique a configuração do backend
- Confirme que o JavaScript de validação está funcionando

### Estilos não carregam
- Verifique os caminhos dos arquivos CSS
- Confirme que os arquivos estão na pasta correta

## 📝 Licença

Este template é livre para uso pessoal e comercial.

## 🤝 Suporte

Para dúvidas ou suporte:
- Email: contato@empresa.com.br
- WhatsApp: (00) 00000-0000

---

Desenvolvido com ❤️ para projetos Laravel + Livewire + Filament
