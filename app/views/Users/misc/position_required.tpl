{extends "`$root`public\included_template\user\user_index_structure.tpl"}

{block name=title} SCOA | JOIN {/block}


{block body}



    <SCOA_BODY>


        {block name=body}


            <div class="row">

                <div class="col-md-8">

                    <div class="ibox">
                        <div class="ibox-title">
                            <strong>Position required</strong>
                        </div>
                        <div class="ibox-content">
                            <div class="row">

                                <div class="col-sm-6 ">

                                    <h3 class="m-t-none m-b text-success">{$user_club.name}</h3>
                                    <h4>{$user_club.member_code}</h4>

                                    <p>This group required your position to be attach on reports and validations</p>

                                    <form role="form" method="post">

                                        <div class="form-group"><label>Position</label>


                                            <select class="form-control m-b" name="position_update" required="">
                                                <option value="1">Treasurer</option>
                                                <option value="2">Auditor</option>
                                                <option value="3">Org_Pres</option>
                                                <option value="4">Governor</option>
                                                <option value="5">Adviser</option>
                                            </select>

                                        </div>


                                        <div>
                                            <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit">
                                                <strong>Submit</strong>
                                            </button>
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                {block name=info}

                    {include "`$root`public\included_template\user\user_index_right_div.tpl"}

                {/block}


            </div>


        {/block}


    </SCOA_BODY>

{/block}