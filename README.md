Saferpay Payment Bundle
========================

Adds the [Saferpay](https://www.saferpay.com) payment gateway to CoreShop through Payum, using the
[karser/payum-saferpay](https://github.com/karser/PayumSaferpay) gateway implementation. Supports the Saferpay
Payment Page and the Transaction interface, automatic language selection from the order locale, and refunds through
the CoreShop payment workflow.

This bundle requires a CoreShop enterprise subscription: `coreshop/enterprise-subscription-bundle` is installed
automatically and `CORESHOP_ENTERPRISE_TOKEN` must be configured (see
[coreshop/enterprise-subscription-bundle](https://github.com/coreshop/enterprise-subscription-bundle)).

## Version lines

| Branch   | CoreShop | Pimcore | PHP       | Admin                 |
|----------|----------|---------|-----------|-----------------------|
| `3.x`    | 5.1      | 12      | 8.3 – 8.4 | Classic admin + Studio |
| `2026.x` | 2026.2   | 2026    | 8.4 – 8.5 | Studio                |
| `2.x`    | 2 – 4    | 10 – 11 | 7.2 – 8.x | Classic admin (frozen) |

## Installation

- `composer req coreshop/payum-saferpay-bundle:^3.0`
- `bin/console pimcore:bundle:enable SaferpayBundle`

## Setup

Go to CoreShop → Payment Providers, add a provider and choose the gateway `saferpay`. Fill in environment,
username, password, customer ID, terminal ID and the interface (Payment Page or Transaction). The optional
PaymentPage parameters (payment methods, wallets, notification e-mails, styling, config set, payer note) are
available in the "Optional parameters" section. The sandbox flag is derived from the chosen environment.

Refunds: refunding a payment in CoreShop executes a Saferpay refund for the transaction.
