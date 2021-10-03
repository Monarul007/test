<div class="center">
    <p><strong>{lang 'Messenger'}</strong></p>
    <p>{desc}</p>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-sm-6">
                            <h3>Chat Room</h3>
                        </div>
                        <div class="col col-sm-6 text-right">
                            <a href="#" class="btn btn-success btn-sm">Private Chat</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="messages_area">
                    {each $chat in $chat_data}
                        {{
                            $msg = $chat["msg"];
                            $created_on = $chat["created_on"];
                            if( !empty($_SESSION['user_data'][$chat['userid']]) ){
                                $from = 'Me';
                                $row_class = 'row justify-content-start';
                                $background_class = 'text-dark alert-light';
                            }else{
                                $from = $chat['user_name'];
                                $row_class = 'row justify-content-end';
                                $background_class = 'alert-success';
                            }
                        }}

                        <div class="{row_class}">
                            <div class="col-sm-10">
                                <div class="shadow-sm alert {background_class}">
                                    <b>{from} - </b>{msg}
                                    <br />
                                    <div class="text-right">
                                        <small><i>{created_on}</i></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/each}
                </div>
            </div>

            <form method="post" id="chat_form" data-parsley-errors-container="#validation_error">
                <div class="input-group mb-3">
                    <textarea class="form-control" id="chat_message" name="chat_message" placeholder="Type Message Here" data-parsley-maxlength="1000" data-parsley-pattern="/^[a-zA-Z0-9\s]+$/" required></textarea>
                    <div class="input-group-append">
                        <button type="submit" name="send" id="send" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                    </div>
                </div>
                <div id="validation_error"></div>
            </form>
        </div>
        <div class="col-lg-4">
            {{ $login_user_id = ''; }}

            {each $value in $_SESSION['user_data']}

                {{ 
                    $login_user_id = $value['id'];
                    $profile = $value['profile'];
                    $name = $value['name'];
                }}

                <input type="hidden" name="login_user_id" id="login_user_id" value="{login_user_id}" />
                <div class="mt-3 mb-3 text-center">
                    <img src="{profile}" width="150" class="img-fluid rounded-circle img-thumbnail" />
                    <h3 class="mt-2">{name}</h3>
                    <a href="profile.php" class="btn btn-secondary mt-2 mb-2">Edit</a>
                    <input type="button" class="btn btn-primary mt-2 mb-2" name="logout" id="logout" value="Logout" />
                </div>
            {/each}

            <div class="card mt-3">
                <div class="card-header">User List</div>
                <div class="card-body" id="user_list">
                    <div class="list-group list-group-flush">
                    {if !empty($user_data) }
                        {each $user in $user_data}
                            {{ 
                                $icon = '<i class="fa fa-circle text-danger"></i>';
                                $user_name = $user["user_name"];
                                $user_profile = $user["user_profile"];
                            }}

                            {if ($user['user_login_status'] == 'Login')}
                                {{ 
                                    $icon = '<i class="fa fa-circle text-success"></i>'; 
                                }}
                            {/if}

                            {if $user['user_id'] != $login_user_id}
                                <a class="list-group-item list-group-item-action">
                                    <img src="{user_profile}" class="img-fluid rounded-circle img-thumbnail" width="50" />
                                    <span class="ml-1"><strong>{user_name}</strong></span>
                                    <span class="mt-2 float-right">{icon}</span>
                                </a>
                            {/if}
                        {/each}
                    {/if}
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>