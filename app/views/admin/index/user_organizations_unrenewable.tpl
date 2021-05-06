{extends "`$root`public\included_template\admin\structures\admin_structure.tpl"}

{assign renewable $org_model->unrenewable_org_list()|@array_chunk:3}

{assign isStrict true}

{include "`$root`public\included_template\admin\admin_user_organizations_un_renewable.tpl"}

