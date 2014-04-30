/**
 * This is a generated class and is not intended for modification.  To customize behavior
 * of this value object you may modify the generated sub-class of this class - Student.as.
 */

package valueObjects
{
import com.adobe.fiber.services.IFiberManagingService;
import com.adobe.fiber.valueobjects.IValueObject;
import flash.events.EventDispatcher;
import mx.collections.ArrayCollection;
import mx.events.PropertyChangeEvent;

import flash.net.registerClassAlias;
import flash.net.getClassByAlias;
import com.adobe.fiber.core.model_internal;
import com.adobe.fiber.valueobjects.IPropertyIterator;
import com.adobe.fiber.valueobjects.AvailablePropertyIterator;

use namespace model_internal;

[Managed]
[ExcludeClass]
public class _Super_Student extends flash.events.EventDispatcher implements com.adobe.fiber.valueobjects.IValueObject
{
    model_internal static function initRemoteClassAliasSingle(cz:Class) : void
    {
    }

    model_internal static function initRemoteClassAliasAllRelated() : void
    {
    }

    model_internal var _dminternal_model : _StudentEntityMetadata;
    model_internal var _changedObjects:mx.collections.ArrayCollection = new ArrayCollection();

    public function getChangedObjects() : Array
    {
        _changedObjects.addItemAt(this,0);
        return _changedObjects.source;
    }

    public function clearChangedObjects() : void
    {
        _changedObjects.removeAll();
    }

    /**
     * properties
     */
    private var _internal_id : int;
    private var _internal_rollNumber : String;
    private var _internal_ldapId : String;
    private var _internal_salutation : String;
    private var _internal_firstName : String;
    private var _internal_middleName : String;
    private var _internal_lastName : String;
    private var _internal_nickName : String;
    private var _internal_gender : String;
    private var _internal_batch : int;
    private var _internal_degree : String;
    private var _internal_departmentCode : String;
    private var _internal_hostel : int;
    private var _internal_roomNumber : String;
    private var _internal_dateOfBirth : Date;
    private var _internal_phoneNumber : String;
    private var _internal_emailId : String;
    private var _internal_skypeId : String;
    private var _internal_createdAt : Date;
    private var _internal_updatedAt : Date;

    private static var emptyArray:Array = new Array();


    /**
     * derived property cache initialization
     */
    model_internal var _cacheInitialized_isValid:Boolean = false;

    model_internal var _changeWatcherArray:Array = new Array();

    public function _Super_Student()
    {
        _model = new _StudentEntityMetadata(this);

        // Bind to own data or source properties for cache invalidation triggering

    }

    /**
     * data/source property getters
     */

    [Bindable(event="propertyChange")]
    public function get id() : int
    {
        return _internal_id;
    }

    [Bindable(event="propertyChange")]
    public function get rollNumber() : String
    {
        return _internal_rollNumber;
    }

    [Bindable(event="propertyChange")]
    public function get ldapId() : String
    {
        return _internal_ldapId;
    }

    [Bindable(event="propertyChange")]
    public function get salutation() : String
    {
        return _internal_salutation;
    }

    [Bindable(event="propertyChange")]
    public function get firstName() : String
    {
        return _internal_firstName;
    }

    [Bindable(event="propertyChange")]
    public function get middleName() : String
    {
        return _internal_middleName;
    }

    [Bindable(event="propertyChange")]
    public function get lastName() : String
    {
        return _internal_lastName;
    }

    [Bindable(event="propertyChange")]
    public function get nickName() : String
    {
        return _internal_nickName;
    }

    [Bindable(event="propertyChange")]
    public function get gender() : String
    {
        return _internal_gender;
    }

    [Bindable(event="propertyChange")]
    public function get batch() : int
    {
        return _internal_batch;
    }

    [Bindable(event="propertyChange")]
    public function get degree() : String
    {
        return _internal_degree;
    }

    [Bindable(event="propertyChange")]
    public function get departmentCode() : String
    {
        return _internal_departmentCode;
    }

    [Bindable(event="propertyChange")]
    public function get hostel() : int
    {
        return _internal_hostel;
    }

    [Bindable(event="propertyChange")]
    public function get roomNumber() : String
    {
        return _internal_roomNumber;
    }

    [Bindable(event="propertyChange")]
    public function get dateOfBirth() : Date
    {
        return _internal_dateOfBirth;
    }

    [Bindable(event="propertyChange")]
    public function get phoneNumber() : String
    {
        return _internal_phoneNumber;
    }

    [Bindable(event="propertyChange")]
    public function get emailId() : String
    {
        return _internal_emailId;
    }

    [Bindable(event="propertyChange")]
    public function get skypeId() : String
    {
        return _internal_skypeId;
    }

    [Bindable(event="propertyChange")]
    public function get createdAt() : Date
    {
        return _internal_createdAt;
    }

    [Bindable(event="propertyChange")]
    public function get updatedAt() : Date
    {
        return _internal_updatedAt;
    }

    public function clearAssociations() : void
    {
    }

    /**
     * data/source property setters
     */

    public function set id(value:int) : void
    {
        var oldValue:int = _internal_id;
        if (oldValue !== value)
        {
            _internal_id = value;
        }
    }

    public function set rollNumber(value:String) : void
    {
        var oldValue:String = _internal_rollNumber;
        if (oldValue !== value)
        {
            _internal_rollNumber = value;
        }
    }

    public function set ldapId(value:String) : void
    {
        var oldValue:String = _internal_ldapId;
        if (oldValue !== value)
        {
            _internal_ldapId = value;
        }
    }

    public function set salutation(value:String) : void
    {
        var oldValue:String = _internal_salutation;
        if (oldValue !== value)
        {
            _internal_salutation = value;
        }
    }

    public function set firstName(value:String) : void
    {
        var oldValue:String = _internal_firstName;
        if (oldValue !== value)
        {
            _internal_firstName = value;
        }
    }

    public function set middleName(value:String) : void
    {
        var oldValue:String = _internal_middleName;
        if (oldValue !== value)
        {
            _internal_middleName = value;
        }
    }

    public function set lastName(value:String) : void
    {
        var oldValue:String = _internal_lastName;
        if (oldValue !== value)
        {
            _internal_lastName = value;
        }
    }

    public function set nickName(value:String) : void
    {
        var oldValue:String = _internal_nickName;
        if (oldValue !== value)
        {
            _internal_nickName = value;
        }
    }

    public function set gender(value:String) : void
    {
        var oldValue:String = _internal_gender;
        if (oldValue !== value)
        {
            _internal_gender = value;
        }
    }

    public function set batch(value:int) : void
    {
        var oldValue:int = _internal_batch;
        if (oldValue !== value)
        {
            _internal_batch = value;
        }
    }

    public function set degree(value:String) : void
    {
        var oldValue:String = _internal_degree;
        if (oldValue !== value)
        {
            _internal_degree = value;
        }
    }

    public function set departmentCode(value:String) : void
    {
        var oldValue:String = _internal_departmentCode;
        if (oldValue !== value)
        {
            _internal_departmentCode = value;
        }
    }

    public function set hostel(value:int) : void
    {
        var oldValue:int = _internal_hostel;
        if (oldValue !== value)
        {
            _internal_hostel = value;
        }
    }

    public function set roomNumber(value:String) : void
    {
        var oldValue:String = _internal_roomNumber;
        if (oldValue !== value)
        {
            _internal_roomNumber = value;
        }
    }

    public function set dateOfBirth(value:Date) : void
    {
        var oldValue:Date = _internal_dateOfBirth;
        if (oldValue !== value)
        {
            _internal_dateOfBirth = value;
        }
    }

    public function set phoneNumber(value:String) : void
    {
        var oldValue:String = _internal_phoneNumber;
        if (oldValue !== value)
        {
            _internal_phoneNumber = value;
        }
    }

    public function set emailId(value:String) : void
    {
        var oldValue:String = _internal_emailId;
        if (oldValue !== value)
        {
            _internal_emailId = value;
        }
    }

    public function set skypeId(value:String) : void
    {
        var oldValue:String = _internal_skypeId;
        if (oldValue !== value)
        {
            _internal_skypeId = value;
        }
    }

    public function set createdAt(value:Date) : void
    {
        var oldValue:Date = _internal_createdAt;
        if (oldValue !== value)
        {
            _internal_createdAt = value;
        }
    }

    public function set updatedAt(value:Date) : void
    {
        var oldValue:Date = _internal_updatedAt;
        if (oldValue !== value)
        {
            _internal_updatedAt = value;
        }
    }

    /**
     * Data/source property setter listeners
     *
     * Each data property whose value affects other properties or the validity of the entity
     * needs to invalidate all previously calculated artifacts. These include:
     *  - any derived properties or constraints that reference the given data property.
     *  - any availability guards (variant expressions) that reference the given data property.
     *  - any style validations, message tokens or guards that reference the given data property.
     *  - the validity of the property (and the containing entity) if the given data property has a length restriction.
     *  - the validity of the property (and the containing entity) if the given data property is required.
     */


    /**
     * valid related derived properties
     */
    model_internal var _isValid : Boolean;
    model_internal var _invalidConstraints:Array = new Array();
    model_internal var _validationFailureMessages:Array = new Array();

    /**
     * derived property calculators
     */

    /**
     * isValid calculator
     */
    model_internal function calculateIsValid():Boolean
    {
        var violatedConsts:Array = new Array();
        var validationFailureMessages:Array = new Array();

        var propertyValidity:Boolean = true;

        model_internal::_cacheInitialized_isValid = true;
        model_internal::invalidConstraints_der = violatedConsts;
        model_internal::validationFailureMessages_der = validationFailureMessages;
        return violatedConsts.length == 0 && propertyValidity;
    }

    /**
     * derived property setters
     */

    model_internal function set isValid_der(value:Boolean) : void
    {
        var oldValue:Boolean = model_internal::_isValid;
        if (oldValue !== value)
        {
            model_internal::_isValid = value;
            _model.model_internal::fireChangeEvent("isValid", oldValue, model_internal::_isValid);
        }
    }

    /**
     * derived property getters
     */

    [Transient]
    [Bindable(event="propertyChange")]
    public function get _model() : _StudentEntityMetadata
    {
        return model_internal::_dminternal_model;
    }

    public function set _model(value : _StudentEntityMetadata) : void
    {
        var oldValue : _StudentEntityMetadata = model_internal::_dminternal_model;
        if (oldValue !== value)
        {
            model_internal::_dminternal_model = value;
            this.dispatchEvent(mx.events.PropertyChangeEvent.createUpdateEvent(this, "_model", oldValue, model_internal::_dminternal_model));
        }
    }

    /**
     * methods
     */


    /**
     *  services
     */
    private var _managingService:com.adobe.fiber.services.IFiberManagingService;

    public function set managingService(managingService:com.adobe.fiber.services.IFiberManagingService):void
    {
        _managingService = managingService;
    }

    model_internal function set invalidConstraints_der(value:Array) : void
    {
        var oldValue:Array = model_internal::_invalidConstraints;
        // avoid firing the event when old and new value are different empty arrays
        if (oldValue !== value && (oldValue.length > 0 || value.length > 0))
        {
            model_internal::_invalidConstraints = value;
            _model.model_internal::fireChangeEvent("invalidConstraints", oldValue, model_internal::_invalidConstraints);
        }
    }

    model_internal function set validationFailureMessages_der(value:Array) : void
    {
        var oldValue:Array = model_internal::_validationFailureMessages;
        // avoid firing the event when old and new value are different empty arrays
        if (oldValue !== value && (oldValue.length > 0 || value.length > 0))
        {
            model_internal::_validationFailureMessages = value;
            _model.model_internal::fireChangeEvent("validationFailureMessages", oldValue, model_internal::_validationFailureMessages);
        }
    }


}

}
