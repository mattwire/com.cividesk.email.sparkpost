{*

*}
{capture assign=smtpURL}{crmURL p='civicrm/admin/setting/smtp' q='reset=1'}{/capture}

<div class="crm-block crm-form-block crm-sparkpost-form-block">
    <div id="sparkpost" class="mailoption">
        <fieldset>
            <legend>{ts}SparkPost Configuration{/ts}</legend>
            <table class="form-layout-compressed">
                <tr class="crm-sparkpost-form-block-apiKey">
                    <td class="label">{$form.apiKey.label}</td>
                    <td>{$form.apiKey.html}<br  />
                        <span class="description">{ts}You can create API keys at:{/ts}
                            <a href="https://app.sparkpost.com/account/credentials" target="_blank">https://app.sparkpost.com/account/credentials</a>
                        </span>
                    </td>
                </tr>
                <tr class="crm-sparkpost-form-block-useBackupMailer">
                    <td class="label">{$form.useBackupMailer.label}</td>
                    <td>{$form.useBackupMailer.html}<br  />
                        <span class="description">{ts 1=$smtpURL}You can define a backup mailer <a href='%1'>here</a>.{/ts}
                            {ts}It will be used if Sparkpost cannot send emails (unverified sending domain, sending limits exceeded, ...).{/ts}
                        </span>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
    <div class="spacer"></div>
    <div class="crm-submit-buttons">
        {include file="CRM/common/formButtons.tpl"}
    </div>
</div>