# Configuration

The Saferpay gateway is configured per payment provider in the CoreShop backend (Studio or classic admin):

| Field              | Description                                                                 |
|--------------------|-----------------------------------------------------------------------------|
| Environment        | `test` or `production`; the sandbox flag is derived from it                 |
| Username, Password | Saferpay JSON API credentials                                                |
| Customer ID        | Saferpay customer id                                                         |
| Terminal ID        | Saferpay terminal id                                                         |
| Interface          | `PAYMENT_PAGE` (hosted page) or `TRANSACTION`                                |
| Optional parameters| PaymentPage options such as payment methods, wallets, notification e-mails, styling, config set and payer note |

The order locale is sent as `Payer.LanguageCode`. Refunding a payment through the CoreShop payment workflow triggers
a Saferpay refund (`core_shop_workflow.state_machine.coreshop_payment` callback, see
`src/Resources/config/pimcore/config.yml`).
