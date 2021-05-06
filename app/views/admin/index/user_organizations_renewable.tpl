{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}

{assign renewable $org_model->renewable_org_list()|@array_chunk:3}

{include "`$root`public\included_template\admin\admin_user_organizations_renewable.tpl"}

