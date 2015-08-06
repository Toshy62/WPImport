<h1>{@wpimport.module_title}</h1>

<fieldset>
    <legend>{@wpimport.set_execution_time}</legend>
    <p>
        {@wpimport.set_execution_time.description}
    </p>
    <div class="# IF CAN_SET_EXECUTION_TIME #success# ELSE #warning# ENDIF # message-helper-small">
        # IF CAN_SET_EXECUTION_TIME #
            {@wpimport.set_execution_time.success}
        # ELSE #
            {@wpimport.set_execution_time.warning}
        # ENDIF #
    </div>
    <p>
        <span style="font-weight: bold">{@wpimport.set_execution_time.default}</span> {MAX_EXECUTION_TIME}s
    </p>
</fieldset>

# INCLUDE FORM #