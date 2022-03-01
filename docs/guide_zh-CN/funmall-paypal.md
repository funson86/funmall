Paypal支付
------



### 帐号相关

- https://developer.paypal.com/developer/applications/

申请Sandbox或者Live帐号，申请成功后获取到Clienet ID

### 开发文档

- https://developer.paypal.com/sdk/js/reference/#oncancel

```
<div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&components=buttons"></script>

<script>
    paypal.Buttons({
        style: {
            layout: 'vertical',
            color:  'blue',
            shape:  'rect',
            label:  'paypal'
        },
        createOrder: function(data, actions) {
            // Set up the transaction
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        'currency_code': 'USD',
                        value: '0.05'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            alert('order paid successfully');
        }
    }).render('#paypal-button-container');
</script>
```

onApprove成功后返回到当前页面，可以通过ajax更新订单好，然后再跳转到显示页面。

### 参考

- https://demo.paypal.com/us/demo/home 各种效果，Paypal checkout  Standard (Client Side)