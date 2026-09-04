## 2026.1.0 (unreleased)

### CoreShop 2026 / Pimcore 2026

- Ported to CoreShop 2026.x (PHP 8.4+, Pimcore 2026): flat `src/` layout, CoreShop bundle skeleton, CCL license.
- Gateway configuration is now a Studio form (`coreshop.studio_form`): environment and interface are choice fields,
  the optional PaymentPage parameters are a nested form (`SaferpayOptionalParametersType`), labels are translated
  via `studio.<locale>.yaml`. The classic (ExtJS) admin panel and its translations are removed; Pimcore 2026 ships
  Studio only.
- `karser/payum-saferpay` raised to `^0.5`.
- Form type renamed to `SaferpayGatewayConfigurationType`; `ConvertPaymentExtension` and `RefundEvent` got typed
  signatures.
