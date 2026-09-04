## 3.0.0 (unreleased)

### CoreShop 5.1 / Pimcore 12

- Ported to CoreShop 5.1 (PHP 8.3+, Pimcore 12): flat `src/` layout, CoreShop bundle skeleton, CCL license.
- Gateway configuration is now a Studio form (`coreshop.studio_form`): environment and interface are choice fields,
  the optional PaymentPage parameters are a nested form (`SaferpayOptionalParametersType`), labels are translated
  via `studio.<locale>.yaml`. The classic (ExtJS) admin panel is still shipped.
- `karser/payum-saferpay` raised to `^0.5`.
- Requires `coreshop/enterprise-subscription-bundle` (registered as dependent bundle).
- Form type renamed to `SaferpayGatewayConfigurationType`; `ConvertPaymentExtension` and `RefundEvent` got typed
  signatures.
