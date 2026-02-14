# 📬 Notification Service - Arquitetura Hexagonal

API de notificações construída com Laravel 12 seguindo os princípios da Arquitetura Hexagonal (Ports & Adapters).

## 🏗️ Arquitetura

```
app/
├── Core/
│   ├── Application/
│   │   └── UseCases/
│   │       └── SendNotification.php      # Caso de uso
│   ├── Domain/
│   │   └── Ports/
│   │       └── Out/
│   │           └── NotificationProviderInterface.php  # Port (contrato)
│   └── Infrastructure/
│       └── Adapters/
│           └── LogNotificationAdapter.php  # Adapter (implementação)
├── Http/
│   ├── Controllers/
│   │   └── NotificationController.php
│   └── Requests/
│       └── SendNotificationRequest.php
```

## 🚀 Instalação

```bash
# Clone o repositório
git clone <repo-url>
cd <projeto>

# Instale as dependências e configure o ambiente
composer setup
```

## ⚙️ Executando

```bash
# Modo desenvolvimento (servidor + queue + logs + vite)
composer dev

# Ou apenas o servidor
php artisan serve
```

## 📡 API

### Enviar Notificação

```http
POST /api/notifications
Content-Type: application/json

{
    "to": "usuario@email.com",
    "message": "Sua mensagem aqui"
}
```

**Resposta (201):**
```json
{
    "status": "success",
    "message": "Notificação processada pela arquitetura hexagonal!"
}
```

### Validações

| Campo     | Regras                    |
|-----------|---------------------------|
| `to`      | obrigatório, string, max:255 |
| `message` | obrigatório, string, min:5, max:1000 |

## 🧪 Testes

```bash
composer test
```

## 🔌 Extensibilidade

Para adicionar um novo provedor de notificação (SMS, Push, etc.), basta:

1. Criar um adapter implementando `NotificationProviderInterface`
2. Registrar o binding no `AppServiceProvider`

```php
// Exemplo: adapter para SMS
class SmsNotificationAdapter implements NotificationProviderInterface
{
    public function send(string $destination, string $content): bool
    {
        // Lógica de envio SMS
    }
}
```

## 🛠️ Tecnologias

- PHP 8.2+
- Laravel 12
- SQLite (padrão)
- PHPUnit 11

## 📄 Licença

MIT
