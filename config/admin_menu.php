<?php

return [
    // 后台首页
    [
        'name' => '后台首页',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'route_name' => 'admin.index.index',
        'child' => [
            [
                'name' => '用户个人操作',
                'is_show' => false,
                'child' => [
                    [
                        'name' => '用户个人信息',
                        'is_show' => false,
                        'route_name' => 'admin.user.info',
                    ],
                    [
                        'name' => '绑定谷歌验证码页面',
                        'is_show' => false,
                        'route_name' => 'admin.user.google'
                    ],
                    [
                        'name' => '绑定谷歌验证码数据',
                        'is_show' => false,
                        'route_name' => 'admin.user.post_google'
                    ],
                    [
                        'name' => '用户个人修改密码页面',
                        'is_show' => false,
                        'route_name' => 'admin.user.modify_pwd',
                    ],
                    [
                        'name' => '用户个人修改密码数据',
                        'is_show' => false,
                        'route_name' => 'admin.user.post_modify_pwd',
                    ], [
                        'name' => '用户个人上传附件',
                        'is_show' => false,
                        'route_name' => 'attachment.upload',
                    ], [
                        'name' => '用户个人删除附件',
                        'is_show' => false,
                        'route_name' => 'attachment.delete'
                    ]
                ]
            ],
            [
                'name' => '欢迎界面',
                'route_name' => 'admin.index.index',
                'child' => []
            ]
        ]
    ],

    // 系统配置
    [
        'name' => '系统配置',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '系统配置管理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.systemconfigs.index',
                'is_show' => 0,
                'child' => [
                    [
                        'name' => '系统配置列表',
                        'route_name' => 'admin.systemconfigs.index',
                    ], [
                        'name' => '添加系统配置页面',
                        'route_name' => 'admin.systemconfigs.create',
                    ], [
                        'name' => '添加系统配置数据',
                        'route_name' => 'admin.systemconfigs.store',
                    ], [
                        'name' => '修改系统配置页面',
                        'route_name' => 'admin.systemconfigs.edit',
                    ], [
                        'name' => '修改系统配置数据',
                        'route_name' => 'admin.systemconfigs.update',
                    ], [
                        'name' => '删除系统配置',
                        'route_name' => 'admin.systemconfigs.destroy',
                    ], [
                        'name' => '批量修改配置',
                        'route_name' => 'admin.systemconfig.sync'
                    ]
                ]
            ],

            [
                'name' => '系统配置分组',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.systemconfigs.config_groups',
                'child' => [
                    [
                        'name' => '系统配置分组页面',
                        'route_name' => 'admin.systemconfigs.config_groups',
                    ], [
                        'name' => '系统配置分组数据',
                        'route_name' => 'admin.systemconfigs.post_config_groups',
                    ]
                ]
            ],

            [
                'name' => '多语言配置',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.systemconfigs.lang_setting',
                'child' => [
                    [
                        'name' => '多语言配置页面',
                        'route_name' => 'admin.systemconfigs.lang_setting',
                    ],

                    [
                        'name' => '设置前端默认语种数据',
                        'route_name' => 'admin.systemconfigs.post_lang_default'
                    ],

                    [
                        'name' => '设置前端开启语种数据',
                        'route_name' => 'admin.systemconfigs.post_lang_fields'
                    ]
                ]
            ],
        ],
    ],

    // 会员管理
    [
        'name' => '会员相关',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '会员管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.members.index',
                'child' => [
                    [
                        'name' => '会员列表',
                        'route_name' => 'admin.members.index',
                    ], [
                        'name' => '添加会员页面',
                        'route_name' => 'admin.members.create',
                    ],
                    // [
                    //     'name' => '查看会员详情',
                    //     'route_name' => 'admin.members.show',
                    // ],
                    [
                        'name' => '添加会员数据',
                        'route_name' => 'admin.members.store',
                    ], [
                        'name' => '修改会员页面',
                        'route_name' => 'admin.members.edit',
                    ], [
                        'name' => '修改会员数据',
                        'route_name' => 'admin.members.update',
                    ], [
                        'name' => '删除会员',
                        'route_name' => 'admin.members.destroy',
                    ], [
                        'name' => '修改会员余额页面',
                        'route_name' => 'admin.member.modify_money',
                    ], [
                        'name' => '修改会员余额数据',
                        'route_name' => 'admin.member.post_modify_money',
                    ],[
                        'name' => '修改会员上级代理页面',
                        'route_name' => 'admin.member.modify_top',
                    ], [
                        'name' => '修改会员上级代理数据',
                        'route_name' => 'admin.member.post_modify_top',
                    ], [
                        'name' => '设置会员代理页面',
                        'route_name' => 'admin.agents.assign',
                    ], [
                        'name' => '设置会员代理数据',
                        'route_name' => 'admin.agents.post_assign',
                    ],[
                        'name' => '会员接口额度页面',
                        'route_name' => 'admin.member.member_apis'
                    ],[
                        'name' => '刷新会员接口额度数据',
                        'route_name' => 'admin.member.refresh_api'
                    ],[
                        'name' => '会员踢下线操作',
                        'route_name' => 'admin.member.make_offline'
                    ],[
                        'name' => '注册选项设置',
                        'route_name' => 'admin.member.register_setting'
                    ],[
                        'name' => '保存注册选项设置',
                        'route_name' => 'admin.member.post_register_setting'
                    ]
                ]
            ],
            [
                'name' => '会员银行卡管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.memberbanks.index',
                'child' => [
                    [
                        'name' => '会员银行卡列表',
                        'route_name' => 'admin.memberbanks.index',
                    ], [
                        'name' => '查看会员银行卡详情',
                        'route_name' => 'admin.memberbanks.show',
                    ]
                ]
            ],
            [
                'name' => '会员游戏记录管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.gamerecords.index',
                'child' => [
                    [
                        'name' => '会员游戏记录列表',
                        'route_name' => 'admin.gamerecords.index',
                    ], [
                        'name' => '查看会员游戏记录详情',
                        'route_name' => 'admin.gamerecords.show',
                    ], [
                        'name' => '删除会员游戏记录',
                        'route_name' => 'admin.gamerecords.destroy'
                    ]
                ]
            ]
        ]
    ],

    // 财务管理
    [
        'name' => '财务管理',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '银行卡类型管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.banks.index',
                'child' => [
                    [
                        'name' => '银行卡类型列表',
                        'route_name' => 'admin.banks.index',
                    ], [
                        'name' => '添加银行卡类型页面',
                        'route_name' => 'admin.banks.create',
                    ], [
                        'name' => '查看银行卡类型详情',
                        'route_name' => 'admin.banks.show',
                    ], [
                        'name' => '添加银行卡类型数据',
                        'route_name' => 'admin.banks.store',
                    ], [
                        'name' => '修改银行卡类型页面',
                        'route_name' => 'admin.banks.edit',
                    ], [
                        'name' => '修改银行卡类型数据',
                        'route_name' => 'admin.banks.update',
                    ], [
                        'name' => '删除银行卡类型',
                        'route_name' => 'admin.banks.destroy',
                    ]
                ]
            ],

            [
                'name' => '支付方式管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.payments.index',
                'child' => [
                    [
                        'name' => '支付方式列表',
                        'route_name' => 'admin.payments.index',
                    ], [
                        'name' => '添加支付方式页面',
                        'route_name' => 'admin.payments.create',
                    ], [
                        'name' => '查看支付方式详情',
                        'route_name' => 'admin.payments.show',
                    ], [
                        'name' => '添加支付方式数据',
                        'route_name' => 'admin.payments.store',
                    ], [
                        'name' => '修改支付方式页面',
                        'route_name' => 'admin.payments.edit',
                    ], [
                        'name' => '修改支付方式数据',
                        'route_name' => 'admin.payments.update',
                    ], [
                        'name' => '删除支付方式',
                        'route_name' => 'admin.payments.destroy',
                    ]
                ]
            ],

            [
                'name' => '充值管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.recharges.index',
                'child' => [
                    [
                        'name' => '充值列表',
                        'route_name' => 'admin.recharges.index',
                    ], [
                        'name' => '查看充值详情',
                        'route_name' => 'admin.recharges.show',
                    ], [
                        'name' => '充值确认页面',
                        'route_name' => 'admin.recharges.confirm'
                    ], [
                        'name' => '充值审核通过',
                        'route_name' => 'admin.recharges.post_confirm'
                    ], [
                        'name' => '充值审核不通过',
                        'route_name' => 'admin.recharges.post_reject'
                    ], [
                        'name' => '删除充值',
                        'route_name' => 'admin.recharges.destroy',
                    ]
                ]
            ],
            [

                'name' => '提款管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.drawings.index',
                'child' => [
                    [
                        'name' => '提款列表',
                        'route_name' => 'admin.drawings.index',
                    ], [
                        'name' => '查看提款详情',
                        'route_name' => 'admin.drawings.show',
                    ], [
                        'name' => '提款确认页面',
                        'route_name' => 'admin.drawings.confirm'
                    ], [
                        'name' => '提款审核通过',
                        'route_name' => 'admin.drawings.post_confirm'
                    ], [
                        'name' => '提款审核不通过',
                        'route_name' => 'admin.drawings.post_reject'
                    ], [
                        'name' => '删除提款',
                        'route_name' => 'admin.drawings.destroy',
                    ]
                ]
            ],
            [
                'name' => '提款金额管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.drawings.setting_size',
                'child' => [
                    [
                        'name' => '提款金额设置页面',
                        'route_name' => 'admin.drawings.setting_size',
                    ],
                    [
                        'name' => '提款金额设置保存',
                        'route_name' => 'admin.drawings.post_setting_size',
                    ],
                ]
            ],
            [
                'name' => '转账记录管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.transfers.index',
                'child' => [
                    [
                        'name' => '转账记录列表',
                        'route_name' => 'admin.transfers.index',
                    ], [
                        'name' => '查看转账记录详情',
                        'route_name' => 'admin.transfers.show',
                    ],
                    [
                        'name' => '删除转账记录',
                        'route_name' => 'admin.transfers.destroy',
                    ]
                ]
            ],

            [
                'name' => '财务报表',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.member.money_report',
                'child' => []
            ]
        ]
    ],

    // 返水管理
    [
        'name' => '反水设置',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '反水等级设置',
                'pid' => null,
                'icon'=> 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.fslevels.index',
                'child' => [
                    [
                        'name' => '反水等级列表',
                        'route_name' => 'admin.fslevels.index',
                    ], [
                        'name' => '添加反水等级页面',
                        'route_name' => 'admin.fslevels.create',
                    ], [
                        'name' => '查看反水等级详情',
                        'route_name' => 'admin.fslevels.show',
                    ], [
                        'name' => '添加反水等级数据',
                        'route_name' => 'admin.fslevels.store',
                    ], [
                        'name' => '修改反水等级页面',
                        'route_name' => 'admin.fslevels.edit',
                    ], [
                        'name' => '修改反水等级数据',
                        'route_name' => 'admin.fslevels.update',
                    ], [
                        'name' => '删除反水等级',
                        'route_name' => 'admin.fslevels.destroy',
                    ],[
                        'name' => '批量新增反水等级页面',
                        'route_name' => 'admin.fslevels.batch_create',
                    ],[
                        'name' => '批量新增反水等级数据',
                        'route_name' => 'admin.fslevels.post_batch_create',
                    ]
                ]
            ],

            [
                'name' => '一键反水发放',
                'pid' => null,
                'icon'=> 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.sendfs.index',
                'remark' => 'is_realtime_fs_mode=0',
                'child' => [
                    [
                        'name' => '一键反水列表',
                        'route_name' => 'admin.sendfs.index',
                    ],[
                        'name' => '保存一键反水数据',
                        'route_name' => 'admin.sendfs.store',
                    ]
                ]
            ]
        ]
    ],

    // 代理管理
    [
        'name' => '代理相关',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '代理管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.agents.index',
                'child' => [
                    [
                        'name' => '代理列表',
                        'route_name' => 'admin.agents.index',
                    ], [
                        'name' => '修改代理页面',
                        'route_name' => 'admin.agents.edit',
                    ], [
                        'name' => '修改代理数据',
                        'route_name' => 'admin.agents.update',
                    ],[
                        'name' => '修改代理反点点位页面',
                        'route_name' => 'admin.agentfdrate.agent'
                    ],[
                        'name' => '修改代理反点点位数据',
                        'route_name' => 'admin.agentfdrate.post_agent'
                    ]
                ]
            ],

            [
                'name' => '会员代理申请管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.memberagentapplies.index',
                'child' => [
                    [
                        'name' => '会员代理申请列表',
                        'route_name' => 'admin.memberagentapplies.index',
                    ], [
                        'name' => '查看会员代理申请详情',
                        'route_name' => 'admin.memberagentapplies.show',
                    ], [
                        'name' => '修改会员代理申请页面',
                        'route_name' => 'admin.memberagentapplies.edit'
                    ], [
                        'name' => '修改会员代理申请数据',
                        'route_name' => 'admin.memberagentapplies.update'
                    ], [
                        'name' => '删除会员代理申请',
                        'route_name' => 'admin.memberagentapplies.destroy',
                    ]
                ]
            ],

            // 传统代理
            [
                'name' => '佣金等级',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.yjlevels.index',
                'remark' => 'agent_fd_mode=0',
                'child' => [
                    [
                        'name' => '佣金等级列表',
                        'route_name' => 'admin.yjlevels.index',
                    ], [
                        'name' => '添加佣金等级页面',
                        'route_name' => 'admin.yjlevels.create',
                    ], [
                        'name' => '查看佣金等级详情',
                        'route_name' => 'admin.yjlevels.show',
                    ], [
                        'name' => '添加佣金等级数据',
                        'route_name' => 'admin.yjlevels.store',
                    ], [
                        'name' => '修改佣金等级页面',
                        'route_name' => 'admin.yjlevels.edit',
                    ], [
                        'name' => '修改佣金等级数据',
                        'route_name' => 'admin.yjlevels.update',
                    ], [
                        'name' => '删除佣金等级',
                        'route_name' => 'admin.yjlevels.destroy',
                    ]
                ]
            ],
            [
                'name' => '佣金发放',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.sendagent.index',
                'remark' => 'agent_fd_mode=0',
                'child' => [
                    [
                        'name' => '代理佣金发放页面',
                        'route_name' => 'admin.sendagent.index',
                    ],
                    [
                        'name' => '代理佣金发放操作',
                        'route_name' => 'admin.sendagent.store',
                    ],
                ]
            ],
            [
                'name' => '佣金发放记录',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.agentyjlogs.index',
                'remark' => 'agent_fd_mode=0',
                'child' => [
                    [
                        'name' => '佣金发放列表',
                        'route_name' => 'admin.agentyjlogs.index',
                    ],
                    [
                        'name' => '佣金发放历史',
                        'route_name' => 'admin.agentyjlog.history',
                    ],
                ]
            ],

            // 全民代理
            [
                'name' => '全民代理点位',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.agentfdrates.index',
                'remark' => 'agent_fd_mode=1',
                'child' => [
                    [
                        'name' => '全民代理点位列表',
                        'route_name' => 'admin.agentfdrates.index',
                    ], [
                        'name' => '查看全民代理点位详情',
                        'route_name' => 'admin.agentfdrates.show',
                    ], [
                        'name' => '创建全民代理点位页面',
                        'route_name' => 'admin.agentfdrates.create',
                    ], [
                        'name' => '创建全民代理点位数据',
                        'route_name' => 'admin.agentfdrates.store',
                    ], [
                        'name' => '修改全民代理点位页面',
                        'route_name' => 'admin.agentfdrates.edit',
                    ], [
                        'name' => '修改全民代理点位数据',
                        'route_name' => 'admin.agentfdrates.update',
                    ], [
                        'name' => '删除全民代理点位',
                        'route_name' => 'admin.agentfdrates.destroy',
                    ]
                ]
            ],
            [
                'name' => '系统默认点位',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.agentfdrate.system',
                'remark' => 'agent_fd_mode=1',
                'child' => [
                    [
                        'name' => '系统默认点位页面',
                        'route_name' => 'admin.agentfdrate.system',
                    ],
                    [
                        'name' => '系统默认点位数据',
                        'route_name' => 'admin.agentfdrate.post_system',
                    ]
                ]
            ],
            [
                'name' => '返点记录',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.agentfdmoneylogs.index',
                'remark' => 'agent_fd_mode=1',
                'child' => [
                    [
                        'name' => '返点记录列表',
                        'route_name' => 'admin.agentfdmoneylogs.index',
                    ], [
                        'name' => '查看返点记录详情',
                        'route_name' => 'admin.agentfdmoneylogs.show',
                    ], [
                        'name' => '创建返点记录页面',
                        'route_name' => 'admin.agentfdmoneylogs.create',
                    ], [
                        'name' => '创建返点记录数据',
                        'route_name' => 'admin.agentfdmoneylogs.store',
                    ], [
                        'name' => '修改返点记录页面',
                        'route_name' => 'admin.agentfdmoneylogs.edit',
                    ], [
                        'name' => '修改返点记录数据',
                        'route_name' => 'admin.agentfdmoneylogs.update',
                    ], [
                        'name' => '删除返点记录',
                        'route_name' => 'admin.agentfdmoneylogs.destroy',
                    ],[
                        'name' => '发放游戏记录返点',
                        'route_name' => 'admin.agentfdmoneylog.handle_record'
                    ]
                ]
            ],
            [
                'name' => '活跃会员充值金额设置',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.agent.active_member',
                'child' => [
                    [
                        'name' => '活跃会员充值金额设置页面',
                        'route_name' => 'admin.agent.active_member',
                    ],
                    [
                        'name' => '活跃会员充值金额设置保存',
                        'route_name' => 'admin.agent.post_active_member',
                    ],
                ]
            ],
        ]
    ],

    // 福利活动
    [
        'name' => '福利活动',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '签到设置',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.dailybonuses.index',
                'child' => [
                    [
                        'name' => '签到设置列表',
                        'route_name' => 'admin.dailybonuses.index',
                    ], [
                        'name' => '查看签到设置详情',
                        'route_name' => 'admin.dailybonuses.show',
                    ], [
                        'name' => '创建签到设置页面',
                        'route_name' => 'admin.dailybonuses.create',
                    ], [
                        'name' => '创建签到设置数据',
                        'route_name' => 'admin.dailybonuses.store',
                    ], [
                        'name' => '修改签到设置页面',
                        'route_name' => 'admin.dailybonuses.edit',
                    ], [
                        'name' => '修改签到设置数据',
                        'route_name' => 'admin.dailybonuses.update',
                    ], [
                        'name' => '删除签到设置',
                        'route_name' => 'admin.dailybonuses.destroy',
                    ]
                ]
            ],
            [
                'name' => '抢红包大小设置',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.dailybonus.setting_size',
                'child' => [
                    [
                        'name' => '抢红包大小设置页面',
                        'route_name' => 'admin.dailybonus.setting_size',
                    ],
                    [
                        'name' => '抢红包大小设置保存',
                        'route_name' => 'admin.dailybonus.post_setting_size',
                    ],
                ]
            ],

            [
                'name' => '抢红包次数设置',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.dailybonus.setting',
                'child' => [
                    [
                        'name' => '抢红包次数设置页面',
                        'route_name' => 'admin.dailybonus.setting',
                    ],
                    [
                        'name' => '抢红包次数设置保存',
                        'route_name' => 'admin.dailybonus.post_setting',
                    ]
                ]
            ],
            [
                'name' => '抢红包说明设置',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.dailybonus.setting_desc',
                'child' => [
                    [
                        'name' => '抢红包说明设置页面',
                        'route_name' => 'admin.dailybonus.setting_desc',
                    ],
                    [
                        'name' => '抢红包说明设置保存',
                        'route_name' => 'admin.dailybonus.post_setting_desc',
                    ],
                ]
            ],
            [
                'name' => '抢红包记录管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.dailybonus.get_redbag_log',
                'child' => [
                    [
                        'name' => '抢红包记录',
                        'route_name' => 'admin.dailybonus.get_redbag_log',
                    ],
                ]
            ],

            [
                'name' => '会员签到记录',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.dailybonuses.record_list',
                'child' => [
                    [
                        'name' => '会员签到列表',
                        'route_name' => 'admin.dailybonuses.record_list'
                    ],
                    [
                        'name' => '审核签到状态',
                        'route_name' => 'admin.dailybonuses.modify_state'
                    ]
                ]
            ],

            [
                'name' => '余额宝方案',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.yuebaoplans.index',
                //'is_open' => 0,
                'child' => [
                    [
                        'name' => '余额宝方案列表',
                        'route_name' => 'admin.yuebaoplans.index',
                        //'is_open' => 0,
                    ], [
                        'name' => '添加余额宝方案页面',
                        'route_name' => 'admin.yuebaoplans.create',
                        //'is_open' => 0,
                    ], [
                        'name' => '查看余额宝方案详情',
                        'route_name' => 'admin.yuebaoplans.show',
                        //'is_open' => 0,
                    ], [
                        'name' => '添加余额宝方案数据',
                        'route_name' => 'admin.yuebaoplans.store',
                        //'is_open' => 0,
                    ], [
                        'name' => '修改余额宝方案页面',
                        'route_name' => 'admin.yuebaoplans.edit',
                        //'is_open' => 0,
                    ], [
                        'name' => '修改余额宝方案数据',
                        'route_name' => 'admin.yuebaoplans.update',
                        //'is_open' => 0,
                    ], [
                        'name' => '删除余额宝方案',
                        'route_name' => 'admin.yuebaoplans.destroy',
                        //'is_open' => 0,
                    ]
                ]
            ],

            [
                'name' => '会员余额宝记录',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.memberyuebaoplans.index',
                //'is_open' => 0,
                'child' => [
                    [
                        'name' => '会员余额宝购买记录',
                        'route_name' => 'admin.memberyuebaoplans.index',
                        //'is_open' => 0,
                    ],
                    [
                        'name' => '会员余额宝盈利记录',
                        'route_name' => 'admin.memberyuebaoplans.interest_history',
                        //'is_open' => 0,
                    ]
                ]
            ],

//            [
//                'name' => '借呗借款记录',
//                'pid' => null,
//                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
//                'route_name' => 'admin.creditpayrecord.borrow',
//                'is_open' => 0,
//                'child' => [
//                    [
//                        'name' => '通过借款申请',
//                        'route_name' => 'admin.creditpayrecord.confirm',
//                        'is_open' => 0,
//                    ],
//                    [
//                        'name' => '拒绝借款申请',
//                        'route_name' => 'admin.creditpayrecord.reject',
//                        'is_open' => 0,
//                    ]
//                ]
//            ],

//            [
//                'name' => '借呗还款记录',
//                'pid' => null,
//                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
//                'route_name' => 'admin.creditpayrecord.lend',
//            ],

            [
                'name' => '活动管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.activities.index',
                'child' => [
                    [
                        'name' => '活动列表',
                        'route_name' => 'admin.activities.index',
                    ], [
                        'name' => '添加活动页面',
                        'route_name' => 'admin.activities.create',
                    ], [
                        'name' => '查看活动详情',
                        'route_name' => 'admin.activities.show',
                    ], [
                        'name' => '添加活动数据',
                        'route_name' => 'admin.activities.store',
                    ], [
                        'name' => '修改活动页面',
                        'route_name' => 'admin.activities.edit',
                    ], [
                        'name' => '修改活动数据',
                        'route_name' => 'admin.activities.update',
                    ], [
                        'name' => '删除活动',
                        'route_name' => 'admin.activities.destroy',
                    ]
                ]
            ],
            [
                'name' => '活动申请列表',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.activityapplies.index',
                'child' => [

                    [
                        'name' => '会员活动申请列表',
                        'route_name' => 'admin.activityapplies.index',
                    ], [
                        'name' => '会员活动审核页面',
                        'route_name' => 'admin.activityapplies.confirm',
                    ], [
                        'name' => '会员活动审核数据',
                        'route_name' => 'admin.activityapplies.post_confirm',
                    ], [
                        'name' => '会员活动优惠发放页面',
                        'route_name' => 'admin.activityapplies.bonus'
                    ], [
                        'name' => '会员活动优惠发放数据',
                        'route_name' => 'admin.activityapplies.post_bonus'
                    ]

                ]
            ],

            /**
            [
                'name' => '任务管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.tasks.index',
                'child' => [
                    [
                        'name' => '任务列表',
                        'route_name' => 'admin.tasks.index',
                    ], [
                        'name' => '添加任务页面',
                        'route_name' => 'admin.tasks.create',
                    ], [
                        'name' => '查看任务详情',
                        'route_name' => 'admin.tasks.show',
                    ], [
                        'name' => '添加任务数据',
                        'route_name' => 'admin.tasks.store',
                    ], [
                        'name' => '修改任务页面',
                        'route_name' => 'admin.tasks.edit',
                    ], [
                        'name' => '修改任务数据',
                        'route_name' => 'admin.tasks.update',
                    ], [
                        'name' => '删除任务',
                        'route_name' => 'admin.tasks.destroy',
                    ]
                ]
            ],
            **/

            /**
            [
                'name' => '晋升等级福利',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.task.level_setting',
                'child' => [
                    [
                        'name' => '晋升等级设置页面',
                        'route_name' => 'admin.task.level_setting',
                    ],
                    [
                        'name' => '晋升等级添加修改数据',
                        'route_name' => 'admin.task.post_level_setting',
                    ],
                    [
                        'name' => '晋升等级删除数据',
                        'route_name' => 'admin.task.delete_level_setting',
                    ]
                ]
            ],
            **/

            [
                'name' => '晋升条件设置',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.levelconfigs.index',
                'child' => [
                    [
                        'name' => '晋升条件列表',
                        'route_name' => 'admin.levelconfigs.index',
                    ], [
                        'name' => '添加晋升条件页面',
                        'route_name' => 'admin.levelconfigs.create',
                    ], [
                        'name' => '查看晋升条件详情',
                        'route_name' => 'admin.levelconfigs.show',
                    ], [
                        'name' => '添加晋升条件数据',
                        'route_name' => 'admin.levelconfigs.store',
                    ], [
                        'name' => '修改晋升条件页面',
                        'route_name' => 'admin.levelconfigs.edit',
                    ], [
                        'name' => '修改晋升条件数据',
                        'route_name' => 'admin.levelconfigs.update',
                    ], [
                        'name' => '删除晋升条件',
                        'route_name' => 'admin.levelconfigs.destroy',
                    ]
                ],
            ],

            [
                'name' => '轮盘抽奖条件',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.memberwheel.setting',
                'child' => [
                    [
                        'name' => '轮盘抽奖条件设置',
                        'route_name' => 'admin.memberwheel.setting',
                    ],
                    [
                        'name' => '轮盘抽奖条件保存',
                        'route_name' => 'admin.memberwheel.post_setting'
                    ]
                ]
            ],

            [
                'name' => '会员转盘奖励记录',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.memberwheels.index',
                'child' => [
                    [
                        'name' => '会员转盘奖励记录列表',
                        'route_name' => 'admin.memberwheels.index',
                    ], [
                        'name' => '会员转盘奖励记录详情',
                        'route_name' => 'admin.memberwheels.show',
                    ], [
                        'name' => '删除会员转盘奖励记录',
                        'route_name' => 'admin.memberwheels.destroy',
                    ], [
                        'name' => '确认发放会员奖励',
                        'route_name' => 'admin.memberwheel.ensure'
                    ]
                ]
            ]
        ]
    ],

    // 内容管理
    [
        'name' => '内容管理',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '系统公告管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.systemnotices.index',
                'child' => [
                    [
                        'name' => '系统公告列表',
                        'route_name' => 'admin.systemnotices.index',
                    ], [
                        'name' => '添加系统公告页面',
                        'route_name' => 'admin.systemnotices.create',
                    ], [
                        'name' => '查看系统公告详情',
                        'route_name' => 'admin.systemnotices.show',
                    ], [
                        'name' => '添加系统公告数据',
                        'route_name' => 'admin.systemnotices.store',
                    ], [
                        'name' => '修改系统公告页面',
                        'route_name' => 'admin.systemnotices.edit',
                    ], [
                        'name' => '修改系统公告数据',
                        'route_name' => 'admin.systemnotices.update',
                    ], [
                        'name' => '删除系统公告',
                        'route_name' => 'admin.systemnotices.destroy',
                    ]
                ]
            ],

            [
                'name' => '文字导航设置',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.systemconfigs.config_content',
                'child' => []
            ],

            [
                'name' => '轮播图管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.banners.index',
                'child' => [
                    [
                        'name' => '轮播图列表',
                        'route_name' => 'admin.banners.index',
                    ], [
                        'name' => '添加轮播图页面',
                        'route_name' => 'admin.banners.create',
                    ], [
                        'name' => '查看轮播图详情',
                        'route_name' => 'admin.banners.show',
                    ], [
                        'name' => '添加轮播图数据',
                        'route_name' => 'admin.banners.store',
                    ], [
                        'name' => '修改轮播图页面',
                        'route_name' => 'admin.banners.edit',
                    ], [
                        'name' => '修改轮播图数据',
                        'route_name' => 'admin.banners.update',
                    ], [
                        'name' => '删除轮播图',
                        'route_name' => 'admin.banners.destroy',
                    ]
                ]
            ],

            [
                'name' => '关于我们管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.abouts.index',
                'child' => [
                    [
                        'name' => '关于我们列表',
                        'route_name' => 'admin.abouts.index',
                    ], [
                        'name' => '添加关于我们页面',
                        'route_name' => 'admin.abouts.create',
                    ], [
                        'name' => '查看关于我们详情',
                        'route_name' => 'admin.abouts.show',
                    ], [
                        'name' => '添加关于我们数据',
                        'route_name' => 'admin.abouts.store',
                    ], [
                        'name' => '修改关于我们页面',
                        'route_name' => 'admin.abouts.edit',
                    ], [
                        'name' => '修改关于我们数据',
                        'route_name' => 'admin.abouts.update',
                    ], [
                        'name' => '删除关于我们',
                        'route_name' => 'admin.abouts.destroy',
                    ]
                ]
            ],

            [
                'name' => '体育比赛管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.sports.index',
                'child' => [
                    [
                        'name' => '体育比赛列表',
                        'route_name' => 'admin.sports.index',
                    ], [
                        'name' => '添加体育比赛页面',
                        'route_name' => 'admin.sports.create',
                    ], [
                        'name' => '查看体育比赛详情',
                        'route_name' => 'admin.sports.show',
                    ], [
                        'name' => '添加体育比赛数据',
                        'route_name' => 'admin.sports.store',
                    ], [
                        'name' => '修改体育比赛页面',
                        'route_name' => 'admin.sports.edit',
                    ], [
                        'name' => '修改体育比赛数据',
                        'route_name' => 'admin.sports.update',
                    ], [
                        'name' => '删除体育比赛',
                        'route_name' => 'admin.sports.destroy',
                    ]
                ]
            ],
        ]
    ],

    // 运营工具
    [
        'name' => '运营工具',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '套利查询',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.quick.arbitrage_query',
            ],
            [
                'name' => '会员套利查询',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.quick.member_arbitrage_query',
            ],
            [
                'name' => '会员掉单处理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.quick.transfer_check',
                'child' => [

                    [
                        'name' => '会员掉单查询',
                        'route_name' => 'admin.quick.transfer_check'
                    ],
                    [
                        'name' => '会员掉单补单',
                        'route_name' => 'admin.quick.add_transfer'
                    ]
                ]
            ],
            [
                'name' => '系统数据清理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.quick.database_clean',
                'child' => [
                    [
                        'name' => '系统数据清理页面',
                        'route_name' => 'admin.quick.database_clean'
                    ],
                    [
                        'name' => '系统数据清理操作',
                        'route_name' => 'admin.quick.post_database_clean'
                    ]
                ]
            ]
        ]
    ],

    // 权限设置
    [
        'name' => '权限设置',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '管理员管理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.users.index',
                'child' => [

                    // 第三层可以不用设置 is_show 默认为0，icon也不需要设置
                    [
                        'name' => '管理员列表',
                        'route_name' => 'admin.users.index',
                    ], [
                        'name' => '添加管理员页面',
                        'route_name' => 'admin.users.create',
                    ], [
                        'name' => '添加管理员数据',
                        'route_name' => 'admin.users.store',
                    ], [
                        'name' => '修改管理员页面',
                        'route_name' => 'admin.users.edit',
                    ], [
                        'name' => '修改管理员数据',
                        'route_name' => 'admin.users.update',
                    ], [
                        'name' => '删除管理员',
                        'route_name' => 'admin.users.destroy',
                    ], [
                        'name' => '分配管理员角色页面',
                        'route_name' => 'admin.users.assign',
                    ], [
                        'name' => '分配管理员角色数据',
                        'route_name' => 'admin.users.post_assign',
                    ],[
                        'name' => '重置管理员谷歌验证码',
                        'route_name' => 'admin.user.post_reset_google'
                    ]
                ]
            ],

            [
                'name' => '角色管理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.roles.index',
                'child' => [
                    [
                        'name' => '角色列表',
                        'route_name' => 'admin.roles.index',
                    ], [
                        'name' => '添加角色页面',
                        'route_name' => 'admin.roles.create',
                    ], [
                        'name' => '添加角色数据',
                        'route_name' => 'admin.roles.store',
                    ], [
                        'name' => '修改角色页面',
                        'route_name' => 'admin.roles.edit',
                    ], [
                        'name' => '修改角色数据',
                        'route_name' => 'admin.roles.update',
                    ], [
                        'name' => '删除角色',
                        'route_name' => 'admin.roles.destroy',
                    ], [
                        'name' => '分配角色权限页面',
                        'route_name' => 'admin.roles.assign',
                    ], [
                        'name' => '分配角色权限数据',
                        'route_name' => 'admin.roles.post_assign',
                    ]
                ]
            ],
            [
                'name' => '权限管理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.permissions.index',
                'child' => [
                    [
                        'name' => '权限列表',
                        'route_name' => 'admin.permissions.index',
                    ], [
                        'name' => '添加权限页面',
                        'route_name' => 'admin.permissions.create',
                    ], [
                        'name' => '查看权限详情',
                        'route_name' => 'admin.permissions.show',
                    ], [
                        'name' => '添加权限数据',
                        'route_name' => 'admin.permissions.store',
                    ], [
                        'name' => '修改权限页面',
                        'route_name' => 'admin.permissions.edit',
                    ], [
                        'name' => '修改权限数据',
                        'route_name' => 'admin.permissions.update',
                    ], [
                        'name' => '删除权限',
                        'route_name' => 'admin.permissions.destroy',
                    ]
                ]
            ],

            [
                'name' => '附件管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.attachments.index',
                'child' => [
                    [
                        'name' => '附件列表',
                        'route_name' => 'admin.attachments.index',
                    ], [
                        'name' => '查看附件详情',
                        'route_name' => 'admin.attachments.show',
                    ], [
                        'name' => '删除附件',
                        'route_name' => 'admin.attachments.destroy',
                    ]
                ]
            ],

            [
                'name' => '屏蔽IP管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.blackips.index',
                'child' => [
                    [
                        'name' => '屏蔽IP列表',
                        'route_name' => 'admin.blackips.index',
                    ], [
                        'name' => '添加屏蔽IP页面',
                        'route_name' => 'admin.blackips.create',
                    ], [
                        'name' => '查看屏蔽IP详情',
                        'route_name' => 'admin.blackips.show',
                    ], [
                        'name' => '添加屏蔽IP数据',
                        'route_name' => 'admin.blackips.store',
                    ], [
                        'name' => '修改屏蔽IP页面',
                        'route_name' => 'admin.blackips.edit',
                    ], [
                        'name' => '修改屏蔽IP数据',
                        'route_name' => 'admin.blackips.update',
                    ], [
                        'name' => '删除屏蔽IP',
                        'route_name' => 'admin.blackips.destroy',
                    ]
                ]
            ],
        ],

    ],

    // 接口功能
    [
        'name' => '接口功能',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '接口管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.apis.index',
                'child' => [
                    [
                        'name' => '接口列表',
                        'route_name' => 'admin.apis.index',
                    ], [
                        'name' => '添加接口页面',
                        'route_name' => 'admin.apis.create',
                    ],
                    [
                        'name' => '添加接口数据',
                        'route_name' => 'admin.apis.store',
                    ], [
                        'name' => '修改接口页面',
                        'route_name' => 'admin.apis.edit',
                    ], [
                        'name' => '修改接口数据',
                        'route_name' => 'admin.apis.update',
                    ], [
                        'name' => '删除接口',
                        'route_name' => 'admin.apis.destroy',
                    ]
                ]
            ],
            [
                'name' => 'API游戏管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.apigames.index',
                'child' => [
                    [
                        'name' => 'API游戏列表',
                        'route_name' => 'admin.apigames.index',
                    ], [
                        'name' => '添加API游戏页面',
                        'route_name' => 'admin.apigames.create',
                    ],
                    [
                        'name' => '添加API游戏数据',
                        'route_name' => 'admin.apigames.store',
                    ], [
                        'name' => '修改API游戏页面',
                        'route_name' => 'admin.apigames.edit',
                    ], [
                        'name' => '修改API游戏数据',
                        'route_name' => 'admin.apigames.update',
                    ], [
                        'name' => '删除API游戏',
                        'route_name' => 'admin.apigames.destroy',
                    ]
                ]
            ],
            [
                'name' => 'API热门游戏厅管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.gamehots.index',
                'child' => [
                    [
                        'name' => 'API热门游戏厅列表',
                        'route_name' => 'admin.gamehots.index',
                    ], [
                        'name' => '添加API热门游戏厅',
                        'route_name' => 'admin.gamehots.create',
                    ],
                    [
                        'name' => '添加API热门游戏厅数据',
                        'route_name' => 'admin.gamehots.store',
                    ], [
                        'name' => '修改API热门游戏厅',
                        'route_name' => 'admin.gamehots.edit',
                    ], [
                        'name' => '修改API热门游戏厅数据',
                        'route_name' => 'admin.gamehots.update',
                    ], [
                        'name' => '删除API热门游戏厅',
                        'route_name' => 'admin.gamehots.destroy',
                    ]
                ]
            ],
            [
                'name' => '手机游戏分类图标',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.apigames.mobile_category',
                'child' => [
                    [
                        'name' => '手机游戏分类图标页面',
                        'route_name' => 'admin.apigames.mobile_category',
                    ], [
                        'name' => '手机游戏分类图标数据',
                        'route_name' => 'admin.apigames.mobile_category_save',
                    ]
                ]
            ],
            [
                'name' => '电子/棋牌游戏管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.gamelists.index',
                'child' => [
                    [
                        'name' => '电子/棋牌游戏列表',
                        'route_name' => 'admin.gamelists.index',
                    ], [
                        'name' => '添加电子/棋牌游戏页面',
                        'route_name' => 'admin.gamelists.create',
                    ],
                    [
                        'name' => '添加电子/棋牌游戏数据',
                        'route_name' => 'admin.gamelists.store',
                    ], [
                        'name' => '修改电子/棋牌游戏页面',
                        'route_name' => 'admin.gamelists.edit',
                    ], [
                        'name' => '修改电子/棋牌游戏数据',
                        'route_name' => 'admin.gamelists.update',
                    ], [
                        'name' => '删除电子/棋牌游戏',
                        'route_name' => 'admin.gamelists.destroy',
                    ]
                ]
            ]
        ]
    ],

    // 日志管理
    [
        'name' => '日志管理',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '后台日志管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.adminlogs.index',
                'child' => [
                    /**
                    [
                    'name' => '后台日志列表',
                    'route_name' => 'admin.adminlogs.index',
                    ],
                     **/
                    [
                        'name' => '查看后台日志详情',
                        'route_name' => 'admin.adminlogs.show',
                    ],
                    [
                        'name' => '删除后台日志',
                        'route_name' => 'admin.adminlogs.destroy',
                    ]
                ]
            ],

            [
                'name' => '管理员登录日志',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.adminlogs.type.login',
            ],

            [
                'name' => '管理员登出日志',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.adminlogs.type.logout',
            ],

            [
                'name' => '管理员操作日志',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.adminlogs.type.action',
            ],

            [
                'name' => '系统异常日志',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.adminlogs.type.system',
            ],

            [
                'name' => '会员操作日志管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.memberlogs.index',
                'child' => [
                    [
                        'name' => '会员操作日志列表',
                        'route_name' => 'admin.memberlogs.index',
                    ], [
                        'name' => '查看会员操作日志详情',
                        'route_name' => 'admin.memberlogs.show',
                    ], [
                        'name' => '删除会员操作日志',
                        'route_name' => 'admin.memberlogs.destroy',
                    ]
                ]
            ],

            [
                'name' => '会员金额日志管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.membermoneylogs.index',
                'child' => [
                    [
                        'name' => '会员金额日志列表',
                        'route_name' => 'admin.membermoneylogs.index',
                    ], [
                        'name' => '查看会员金额日志详情',
                        'route_name' => 'admin.membermoneylogs.show',
                    ], [
                        'name' => '删除会员日志金额',
                        'route_name' => 'admin.membermoneylogs.destroy',
                    ]
                ]
            ],
        ]
    ],

    [
        'name' => '站内信',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '站内信管理',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.messages.index',
                'child' => [
                    [
                        'name' => '站内信群发列表',
                        'route_name' => 'admin.messages.index',
                    ], [
                        'name' => '添加站内信页面',
                        'route_name' => 'admin.messages.create',
                    ], [
                        'name' => '添加站内信数据',
                        'route_name' => 'admin.messages.store',
                    ], [
                        'name' => '查看站内信详情',
                        'route_name' => 'admin.messages.show',
                    ], [
                        'name' => '修改站内信页面',
                        'route_name' => 'admin.messages.edit'
                    ], [
                        'name' => '修改站内信数据',
                        'route_name' => 'admin.messages.update'
                    ], [
                        'name' => '删除站内信',
                        'route_name' => 'admin.messages.destroy',
                    ]
                ]
            ],

            [
                'name' => '会员站内信反馈',
                'pid' => null,
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.messages.index_member',
                'child' => [
                    [
                        'name' => '会员反馈列表',
                        'route_name' => 'admin.messages.index_member'
                    ], [
                        'name' => '回复会员反馈页面',
                        'route_name' => 'admin.messages.reply'
                    ], [
                        'name' => '回复会员反馈数据',
                        'route_name' => 'admin.messages.post_reply'
                    ],
                    // [
                    //     'name' => '反馈回复详情'
                    // ]
                ]
            ]
        ]
    ],

    /**
    [
        'name' => '全民代理',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [

        ],
    ],
    **/

    [
        'name' => 'APP相关',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => 'APP公告',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.systemnotice.app',
                'child' => []
            ],

            [
                'name' => 'APP内容管理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.systemconfigs.config_app_content',
                'child' => []
            ],

            [
                'name' => 'APP活动管理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.activity.app_index',
                'child' => []
            ]
        ]
    ],

    [
        'name' => '广告超链接',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'child' => [
            [
                'name' => '页面路由管理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.quickurls.index',
                'child' => [
                    [
                        'name' => '页面路由列表',
                        'route_name' => 'admin.quickurls.index',
                    ], [
                        'name' => '添加页面路由页面',
                        'route_name' => 'admin.quickurls.create',
                    ], [
                        'name' => '查看页面路由详情',
                        'route_name' => 'admin.quickurls.show',
                    ], [
                        'name' => '添加页面路由数据',
                        'route_name' => 'admin.quickurls.store',
                    ], [
                        'name' => '修改页面路由页面',
                        'route_name' => 'admin.quickurls.edit',
                    ], [
                        'name' => '修改页面路由数据',
                        'route_name' => 'admin.quickurls.update',
                    ], [
                        'name' => '删除页面路由',
                        'route_name' => 'admin.quickurls.destroy',
                    ]
                ]
            ],

            [
                'name' => '角落广告管理',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.asideadvs.index',
                'child' => [
                    [
                        'name' => '角落广告列表',
                        'route_name' => 'admin.asideadvs.index',
                    ], [
                        'name' => '添加角落广告页面',
                        'route_name' => 'admin.asideadvs.create',
                    ], [
                        'name' => '查看角落广告详情',
                        'route_name' => 'admin.asideadvs.show',
                    ], [
                        'name' => '添加角落广告数据',
                        'route_name' => 'admin.asideadvs.store',
                    ], [
                        'name' => '修改角落广告页面',
                        'route_name' => 'admin.asideadvs.edit',
                    ], [
                        'name' => '修改角落广告数据',
                        'route_name' => 'admin.asideadvs.update',
                    ], [
                        'name' => '删除角落广告',
                        'route_name' => 'admin.asideadvs.destroy',
                    ]
                ]
            ],
        ],
    ],

    [
        'name' => '后台通用功能',
        'pid' => null,
        'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
        'is_show' => 'false',
        'child' => [
            [
                'name' => '后台消息提醒',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.notice',
                'child' => []
            ],
            [
                'name' => '图片地址修复',
                'icon' => 'mdi mdi-checkbox-multiple-blank-circle-outline',
                'route_name' => 'admin.fix.url',
            ]
        ]
    ]
];
