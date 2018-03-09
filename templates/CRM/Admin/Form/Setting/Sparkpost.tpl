{*

*}
{capture assign=smtpURL}{crmURL p='civicrm/admin/setting/smtp' q='reset=1'}{/capture}

<div class="crm-block crm-form-block crm-sparkpost-form-block">
    <div id="sparkpost" class="mailoption">
        <fieldset>
            <legend>{ts}SparkPost Configuration{/ts}</legend>
            <table class="form-layout-compressed">
                <tr class="crm-sparkpost-form-block-sparkpost_apiKey">
                    <td class="label">{$form.sparkpost_apiKey.label}</td>
                    <td>{$form.sparkpost_apiKey.html}<br  />
                        <span class="description">{ts}You can create API keys at:{/ts}
                            <a href="https://app.sparkpost.com/account/credentials" target="_blank">https://app.sparkpost.com/account/credentials</a>
                        </span>
                    </td>
                </tr>
                <tr class="crm-sparkpost-form-block-sparkpost_ipPool">
                    <td class="label">{$form.sparkpost_ipPool.label}</td>
                    <td>{$form.sparkpost_ipPool.html}<br  />
                        <span class="description">{ts}Only used if you have one or more dedicated IP addresses at SparkPost.{/ts}</span>
                    </td>
                </tr>
            </table>

            <p>{ts 1=$sparkpost_test_email}Test emails will be sent to: %1{/ts}</p>
        </fieldset>
    </div>
    <div class="spacer"></div>
    <div class="crm-submit-buttons">
        {include file="CRM/common/formButtons.tpl"}
    </div>
</div>
